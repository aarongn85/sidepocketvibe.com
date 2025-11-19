# Discord Component CSS Update

Replace the Discord CSS section (from `/* Sticky Discord Sidebar */` to `/* Learning Resources Section */`) with this complete new styling:

```css
/* ==================================================
   STICKY DISCORD SIDEBAR - Complete Redesign
   ================================================== */

/* Main Container */
.discord-sticky {
  position: fixed;
  top: 0;
  right: 0;
  height: 100vh;
  width: 400px;
  z-index: 999;
  transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), width 0.4s
      cubic-bezier(0.4, 0, 0.2, 1);
  display: flex;
  flex-direction: column;
}

.discord-sticky.collapsed {
  transform: translateX(400px);
}

.discord-sticky.expanded {
  width: 900px;
}

.discord-sticky.expanded.collapsed {
  transform: translateX(900px);
}

/* Control Buttons (Always Visible) */
.discord-controls {
  position: absolute;
  left: -50px;
  top: 50%;
  transform: translateY(-50%);
  display: flex;
  flex-direction: column;
  gap: 8px;
  z-index: 2;
}

.discord-btn {
  width: 50px;
  height: 50px;
  background: linear-gradient(135deg, #5865f2 0%, #7289da 100%);
  border: none;
  border-radius: 8px 0 0 8px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: -4px 0 12px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
  color: white;
}

.discord-btn:hover {
  background: linear-gradient(135deg, #4752c4 0%, #5b6fb8 100%);
  left: -5px;
  position: relative;
}

.discord-btn svg {
  transition: transform 0.3s ease;
}

.discord-collapse-btn svg {
  transform: rotate(0deg);
}

.discord-sticky:not(.collapsed) .discord-collapse-btn svg {
  transform: rotate(180deg);
}

.discord-expand-btn svg {
  transform: rotate(0deg);
}

.discord-sticky.expanded .discord-expand-btn svg {
  transform: rotate(90deg);
}

/* Open Button (when collapsed) */
.discord-open-btn {
  position: absolute;
  left: -50px;
  top: 50%;
  transform: translateY(-50%);
  width: 50px;
  height: 100px;
  background: linear-gradient(135deg, #5865f2 0%, #7289da 100%);
  border: none;
  border-radius: 8px 0 0 8px;
  cursor: pointer;
  display: none;
  align-items: center;
  justify-content: center;
  box-shadow: -4px 0 12px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
  z-index: 1;
}

.discord-sticky.collapsed .discord-open-btn {
  display: flex;
}

.discord-sticky.collapsed .discord-controls {
  display: none;
}

.discord-open-btn:hover {
  background: linear-gradient(135deg, #4752c4 0%, #5b6fb8 100%);
  left: -55px;
}

.discord-icon-btn {
  width: 36px;
  height: 36px;
  fill: white;
}

/* Main Panel */
.discord-panel {
  width: 100%;
  height: 100%;
  background-color: #36393f;
  box-shadow: -4px 0 16px rgba(0, 0, 0, 0.3);
  display: flex;
  overflow: hidden;
}

/* ==================================================
   NAVIGATION SIDEBAR (Left Side - Collapsed View)
   ================================================== */

.discord-nav {
  width: 240px;
  background-color: #2f3136;
  display: flex;
  flex-direction: column;
  flex-shrink: 0;
  transition: all 0.3s ease;
}

.discord-sticky.expanded .discord-nav {
  width: 260px;
}

.discord-nav-header {
  padding: 1rem;
  border-bottom: 1px solid #202225;
  display: flex;
  align-items: center;
  gap: 0.75rem;
  background-color: #202225;
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2), 0 2px 0 rgba(0, 0, 0, 0.06);
}

.discord-nav-header .discord-icon {
  width: 24px;
  height: 24px;
  fill: #5865f2;
  flex-shrink: 0;
}

.discord-nav-header h3 {
  color: #fff;
  font-size: 1rem;
  font-weight: 700;
  margin: 0;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* Navigation Sections */
.discord-nav-section {
  padding: 0.75rem 0.5rem;
}

.discord-nav-title {
  padding: 0.5rem 0.75rem;
  font-size: 0.75rem;
  font-weight: 700;
  color: #8e9297;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

/* Channel Items */
.discord-channel-item {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.5rem 0.75rem;
  margin: 0.125rem 0;
  border-radius: 4px;
  cursor: pointer;
  transition: all 0.15s ease;
  color: #96989d;
  font-size: 0.95rem;
}

.discord-channel-item:hover {
  background-color: #393c43;
  color: #dcddde;
}

.discord-channel-item.active {
  background-color: #393c43;
  color: #fff;
}

.channel-icon {
  font-size: 1.2rem;
  color: #8e9297;
  flex-shrink: 0;
}

.discord-channel-item.active .channel-icon {
  color: #fff;
}

.channel-name {
  flex: 1;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.channel-badge {
  background-color: #f23f42;
  color: white;
  padding: 0.125rem 0.375rem;
  border-radius: 8px;
  font-size: 0.7rem;
  font-weight: 700;
  min-width: 20px;
  text-align: center;
}

/* Server Items */
.discord-server-item {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.75rem;
  margin: 0.25rem 0;
  border-radius: 6px;
  cursor: pointer;
  transition: all 0.15s ease;
  background-color: rgba(0, 0, 0, 0.1);
}

.discord-server-item:hover {
  background-color: rgba(0, 0, 0, 0.2);
}

.discord-server-item.members-only {
  opacity: 0.7;
}

.server-icon {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: linear-gradient(135deg, #5865f2, #7289da);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
  flex-shrink: 0;
}

.server-info {
  flex: 1;
  min-width: 0;
}

.server-name {
  color: #fff;
  font-size: 0.9rem;
  font-weight: 600;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  margin-bottom: 0.125rem;
}

.server-meta {
  color: #8e9297;
  font-size: 0.75rem;
}

.lock-icon {
  font-size: 1rem;
  opacity: 0.6;
}

/* Navigation Footer */
.discord-nav-footer {
  margin-top: auto;
  padding: 1rem;
  border-top: 1px solid #202225;
}

.discord-join-main-btn {
  width: 100%;
  background: linear-gradient(135deg, #5865f2 0%, #7289da 100%);
  color: white;
  border: none;
  padding: 0.75rem;
  border-radius: 4px;
  font-weight: 700;
  font-size: 0.9rem;
  cursor: pointer;
  transition: all 0.2s ease;
}

.discord-join-main-btn:hover {
  background: linear-gradient(135deg, #4752c4 0%, #5b6fb8 100%);
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(88, 101, 242, 0.3);
}

/* ==================================================
   MAIN CHAT AREA (Right Side - Expanded View)
   ================================================== */

.discord-main {
  flex: 1;
  display: flex;
  flex-direction: column;
  background-color: #36393f;
  min-width: 0;
}

/* Chat Header */
.discord-header {
  background-color: #36393f;
  padding: 0.75rem 1rem;
  border-bottom: 1px solid #202225;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2), 0 2px 0 rgba(0, 0, 0, 0.06);
  flex-shrink: 0;
}

.discord-header-left {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  min-width: 0;
  flex: 1;
}

.channel-icon-header {
  font-size: 1.5rem;
  color: #8e9297;
  flex-shrink: 0;
}

.discord-header h3 {
  color: #fff;
  font-size: 1rem;
  font-weight: 700;
  margin: 0;
  white-space: nowrap;
}

.channel-topic {
  color: #96989d;
  font-size: 0.85rem;
  margin-left: 0.5rem;
  padding-left: 0.5rem;
  border-left: 1px solid #4f545c;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.discord-header-right {
  display: flex;
  align-items: center;
  gap: 1rem;
  flex-shrink: 0;
}

.discord-online-count {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: #b9bbbe;
  font-size: 0.85rem;
  font-weight: 600;
}

.online-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background-color: #43b581;
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0%,
  100% {
    opacity: 1;
  }
  50% {
    opacity: 0.5;
  }
}

/* Messages Area */
.discord-messages {
  flex: 1;
  overflow-y: auto;
  padding: 1rem;
  background-color: #36393f;
}

.discord-messages::-webkit-scrollbar {
  width: 14px;
}

.discord-messages::-webkit-scrollbar-track {
  background: #2e3136;
}

.discord-messages::-webkit-scrollbar-thumb {
  background: #202225;
  border-radius: 8px;
  border: 3px solid #2e3136;
}

.discord-messages::-webkit-scrollbar-thumb:hover {
  background: #1a1d21;
}

/* Message Item */
.discord-message {
  display: flex;
  gap: 1rem;
  padding: 0.5rem 0;
  transition: background-color 0.1s ease;
  border-radius: 4px;
  padding: 0.5rem 0.5rem 0.5rem 1rem;
  margin: 0 -0.5rem 0 -1rem;
}

.discord-message:hover {
  background-color: #32353b;
}

.discord-avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: linear-gradient(135deg, #5865f2, #7289da);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-weight: 700;
  font-size: 0.95rem;
  flex-shrink: 0;
  box-shadow: 0 0 0 2px #36393f;
}

.discord-message-content {
  flex: 1;
  min-width: 0;
}

.discord-message-header {
  display: flex;
  align-items: baseline;
  gap: 0.5rem;
  margin-bottom: 0.25rem;
  flex-wrap: wrap;
}

.discord-username {
  color: #fff;
  font-weight: 600;
  font-size: 1rem;
  cursor: pointer;
  transition: text-decoration 0.1s ease;
}

.discord-username:hover {
  text-decoration: underline;
}

.discord-role {
  background-color: rgba(88, 101, 242, 0.15);
  color: #5865f2;
  padding: 0.125rem 0.375rem;
  border-radius: 3px;
  font-size: 0.65rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.discord-role.moderator {
  background-color: rgba(87, 242, 135, 0.15);
  color: #57f287;
}

.discord-role.vip {
  background-color: rgba(254, 231, 92, 0.15);
  color: #fee75c;
}

.discord-timestamp {
  color: #72767d;
  font-size: 0.75rem;
  font-weight: 500;
}

.discord-message-text {
  color: #dcddde;
  font-size: 1rem;
  line-height: 1.5;
  word-wrap: break-word;
}

/* Input Area */
.discord-input-area {
  padding: 1.5rem 1rem;
  background-color: #36393f;
  flex-shrink: 0;
}

.discord-input-wrapper {
  background-color: #40444b;
  border-radius: 8px;
  padding: 0.75rem 1rem;
  cursor: text;
  transition: background-color 0.15s ease;
}

.discord-input-wrapper:hover {
  background-color: #383c43;
}

.discord-input-placeholder {
  color: #72767d;
  font-size: 1rem;
}

/* ==================================================
   RESPONSIVE DESIGN
   ================================================== */

@media (max-width: 1024px) {
  .discord-sticky {
    width: 350px;
  }

  .discord-sticky.collapsed {
    transform: translateX(350px);
  }

  .discord-sticky.expanded {
    width: 700px;
  }

  .discord-sticky.expanded.collapsed {
    transform: translateX(700px);
  }

  .discord-nav {
    width: 220px;
  }

  .discord-sticky.expanded .discord-nav {
    width: 240px;
  }

  .channel-topic {
    display: none;
  }
}

@media (max-width: 768px) {
  .discord-sticky {
    width: 100%;
    max-width: 320px;
  }

  .discord-sticky.collapsed {
    transform: translateX(100%);
  }

  .discord-sticky.expanded {
    width: 100%;
    max-width: 320px;
  }

  .discord-sticky.expanded.collapsed {
    transform: translateX(100%);
  }

  .discord-expand-btn {
    display: none;
  }

  .discord-controls {
    left: -45px;
  }

  .discord-open-btn {
    left: -45px;
    width: 45px;
    height: 90px;
  }

  .discord-btn {
    width: 45px;
    height: 45px;
  }

  .discord-nav {
    width: 100%;
  }

  .discord-online-count {
    font-size: 0.75rem;
  }

  .discord-message {
    padding: 0.5rem 0.25rem;
  }

  .discord-avatar {
    width: 36px;
    height: 36px;
    font-size: 0.85rem;
  }

  .discord-message-text {
    font-size: 0.95rem;
  }
}
```
