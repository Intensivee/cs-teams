<?php

require_once __DIR__ . '/../security/RouteGuard.php';
class AppController {

    protected int $currentUserId;
    private $request;

    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_METHOD'];
        $this->currentUserId = RouteGuard::getAuthenticatedUserId();
    }

    protected function isGet(): bool {
        return $this->request === "GET";
    }

    protected function isPost(): bool {
        return $this->request === 'POST';
    }

    protected function render(string $templateName = null, array $variables = []) {
        $templatePath = 'public/views/'.$templateName.'.php';
        $output = 'File not found';

        if (file_exists($templatePath)){
            extract($variables);

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }

        print $output;
        return null;
    }

    protected function handleException($exception) {
        return $this->render('error', ['message'=>$exception->getMessage()]);
    }
}