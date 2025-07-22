<?php

    /**
     * GIT DEPLOYMENT SCRIPT
     *
     * Used for automatically deploying websites via GitHub or Bitbucket
     * For more information, see: https://gist.github.com/Mo7am/1d006180371465227054
     */

    // The GitHub webhook secret. This must match the secret configured in your GitHub repository settings.
    // If you don't have one, leave it empty, but it's highly recommended for security.
    $secret = 'NONIKCANTIK123NONIK123CANTIK123'; // CHANGE THIS TO YOUR ACTUAL SECRET

    // The full path to your repository on the server.
    $repo_dir = '/home/richwellness/web/richwellness.my.id/public_html'; // CHANGE THIS TO YOUR ACTUAL REPO PATH

    // The branch to deploy from. This should match the branch you configured in your GitHub webhook.
    $branch = 'main'; // CHANGE THIS IF YOUR BRANCH IS NOT 'main' (e.g., 'master')

    // Log file path
    $log_file = '/var/log/deploy.log'; // CHANGE THIS TO A SUITABLE LOG FILE PATH

    // Function to log messages
    function log_message($message) {
        global $log_file;
        file_put_contents($log_file, date('Y-m-d H:i:s') . ' - ' . $message . "\n", FILE_APPEND);
    }

    log_message('Deployment initiated.');

    // Check for the secret (if configured)
    if (!empty($secret)) {
        $signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
        $payload = file_get_contents('php://input');
        $hash = 'sha256=' . hash_hmac('sha256', $payload, $secret);

        if (!hash_equals($hash, $signature)) {
            log_message('Invalid secret. Deployment aborted.');
            http_response_code(403);
            die('Invalid secret');
        }
    }

    // Get the payload from GitHub
    $payload = json_decode(file_get_contents('php://input'), true);

    // Check if it's a push event to the correct branch
    if ($payload['ref'] !== 'refs/heads/' . $branch) {
        log_message('Not a push event to the configured branch. Deployment aborted.');
        die('Not a push event to the configured branch');
    }

    // Change to the repository directory
    chdir($repo_dir);

    // Pull the latest changes from the repository
    // Using --force-with-lease to avoid overwriting local changes if they exist and are not pushed
    // and --rebase to handle divergent branches by replaying local commits on top of fetched ones.
    // If rebase causes conflicts, it will stop and require manual intervention.
    $output = shell_exec('git pull --rebase origin ' . escapeshellarg($branch) . ' 2>&1');
    log_message('Git pull output: ' . $output);

    // Check for rebase conflicts
    if (strpos($output, 'CONFLICT') !== false || strpos($output, 'fatal') !== false) {
        log_message('Git pull failed due to conflicts or fatal error. Manual intervention required.');
        http_response_code(500);
        die('Deployment failed: Git conflicts or fatal error. Check logs for details.');
    }

    // Run composer install/update if composer.json exists
    if (file_exists('composer.json')) {
        log_message('Running composer install...');
        $output = shell_exec('composer install --no-dev --prefer-dist --optimize-autoloader 2>&1');
        log_message('Composer install output: ' . $output);
    }

    // Run Laravel migrations if artisan exists
    if (file_exists('artisan')) {
        log_message('Running php artisan migrate --force...');
        $output = shell_exec('php artisan migrate --force 2>&1');
        log_message('Artisan migrate output: ' . $output);

        log_message('Running php artisan config:clear...');
        $output = shell_exec('php artisan config:clear 2>&1');
        log_message('Artisan config:clear output: ' . $output);

        log_message('Running php artisan cache:clear...');
        $output = shell_exec('php artisan cache:clear 2>&1');
        log_message('Artisan cache:clear output: ' . $output);

        log_message('Running php artisan view:clear...');
        $output = shell_exec('php artisan view:clear 2>&1');
        log_message('Artisan view:clear output: ' . $output);

        log_message('Running php artisan route:clear...');
        $output = shell_exec('php artisan route:clear 2>&1');
        log_message('Artisan route:clear output: ' . $output);

        log_message('Running php artisan optimize...');
        $output = shell_exec('php artisan optimize 2>&1');
        log_message('Artisan optimize output: ' . $output);
    }

    log_message('Deployment completed successfully.');
    echo 'Deployment successful!';

?>



live
