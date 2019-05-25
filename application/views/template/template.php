<!DOCTYPE html>
<html lang="en">
<? $this->load->view('template/header'); ?>
    <body>
<? $this->load->view('template/nav_bar'); ?>

        <!-- Begin page content -->
        <div class="container">
            <div class="page-header">
                <h1><?= isset($heading) ? $heading : 'Did you forget to add "$heading"?' ?></h1>
            </div>
            <?= isset($main_content) ? $main_content : 'Missing body???' ?>
        </div>

        <footer class="footer">
<? $this->load->view('template/footer'); ?>
        </footer>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/assets/bootstrap/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="/assets/bootstrap/bootstrap-3.3.5-dist/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
