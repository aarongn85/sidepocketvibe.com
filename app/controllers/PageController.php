<?php
/**
 * Page Controller
 * Handles static pages
 */

class PageController extends Controller {
    /**
     * Display about page
     */
    public function about() {
        $data = ['title' => 'About Us'];
        $this->view('pages/about', $data);
    }

    /**
     * Display contact page
     */
    public function contact() {
        $data = ['title' => 'Contact Us'];
        $this->view('pages/contact', $data);
    }
}
