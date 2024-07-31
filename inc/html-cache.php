<?php 
class HTMLCache
{
    private $enabled;
    private $output;
    private $page;
    private $excludedExtensions = ['ico', 'css', 'svg', 'js', 'png', 'jpg', 'jpeg', 'gif'];

    public function __construct($mode, $page)
    {
        $this->enabled = ($mode === 'html');
        $this->page = $page === 'home' ? 'index' : $page;

        if ($this->enabled && !$this->isStaticResource()) {
            ob_start();
        }
    }

    public function generate()
    {
        if ($this->enabled && !$this->isStaticResource()) {
            $this->output = ob_get_contents();
            ob_end_clean();
            $this->saveFile();
        } else {
            ob_end_flush();
        }
    }

    private function saveFile()
    {
        $directory = 'public/';
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filePath = $directory . $this->page . '.html';
        file_put_contents($filePath, $this->output);
    }

    private function isStaticResource()
    {
        $pathInfo = pathinfo($_SERVER['REQUEST_URI']);
        $extension = isset($pathInfo['extension']) ? strtolower($pathInfo['extension']) : '';

        return in_array($extension, $this->excludedExtensions);
    }
}
