<?php
/**
 * Database Class for SidePocketVibe
 * Handles PostgreSQL connection and common database operations
 * Singleton pattern for connection management
 */

class Database {
    private $connection;
    private static $instance = null;

    /**
     * Private constructor for singleton pattern
     */
    private function __construct() {
        $this->connect();
    }

    /**
     * Get singleton instance of Database
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Connect to PostgreSQL database
     * Connection is deferred until first query
     */
    private function connect() {
        // Connection will be established on first use
        // This allows the site to work without database for now
    }
    
    /**
     * Establish actual database connection
     */
    private function ensureConnection() {
        if ($this->connection !== null) {
            return; // Already connected
        }
        
        try {
            $dsn = "pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
            $this->connection = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
            
            if (APP_DEBUG) {
                error_log("PostgreSQL database connected successfully");
            }
        } catch (PDOException $e) {
            if (APP_DEBUG) {
                error_log("Database connection failed: " . $e->getMessage());
            }
            throw new Exception("Database not available yet");
        }
    }

    /**
     * Get the PDO connection
     */
    public function getConnection() {
        return $this->connection;
    }

    /**
     * Execute a prepared statement and return results as associative array
     */
    public function query($sql, $params = []) {
        $this->ensureConnection();
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            if (APP_DEBUG) {
                error_log("Query failed: " . $e->getMessage());
            }
            throw new Exception("Query execution failed");
        }
    }

    /**
     * Execute a prepared statement and return single row
     */
    public function queryRow($sql, $params = []) {
        $this->ensureConnection();
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            if (APP_DEBUG) {
                error_log("Query failed: " . $e->getMessage());
            }
            throw new Exception("Query execution failed");
        }
    }

    /**
     * Execute a prepared statement and return affected rows count
     */
    public function execute($sql, $params = []) {
        $this->ensureConnection();
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            if (APP_DEBUG) {
                error_log("Execute failed: " . $e->getMessage());
            }
            throw new Exception("Statement execution failed");
        }
    }

    /**
     * Insert record and return last insert ID
     */
    public function insert($sql, $params = []) {
        $this->ensureConnection();
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            if (APP_DEBUG) {
                error_log("Insert failed: " . $e->getMessage());
            }
            throw new Exception("Insert operation failed");
        }
    }

    /**
     * Sanitize input for database queries
     */
    public function sanitize($input) {
        if (is_string($input)) {
            return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
        }
        return $input;
    }

    /**
     * Begin transaction
     */
    public function beginTransaction() {
        return $this->connection->beginTransaction();
    }

    /**
     * Commit transaction
     */
    public function commit() {
        return $this->connection->commit();
    }

    /**
     * Rollback transaction
     */
    public function rollback() {
        return $this->connection->rollBack();
    }

    /**
     * Check if connection is alive
     */
    public function isConnected() {
        if ($this->connection === null) {
            return false;
        }
        try {
            $this->connection->query('SELECT 1');
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Close connection
     */
    public function close() {
        $this->connection = null;
    }

    /**
     * Prevent cloning of singleton
     */
    private function __clone() {}

    /**
     * Prevent unserialization of singleton
     */
    public function __wakeup() {}
}
