<!-- เอาจากเว็บ -->
<!DOCTYPE htmlPUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- เอาจากเว็บ -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <!-- เอาจากเว็บ -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ร้านสหายอลูมิเนียมกระจก</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="../../index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">นารีประดิษฐ์</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">นารีประดิษฐ์</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <?php 
    include('../bar/navbar.php');    
    include('../bar/sidebar.php');

    ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <!-- <h1> -->

                    <!-- </h1> -->

                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">

                    <!------------ การคำนวณ ------------------->
                            <script language="javascript">
                            function a() {

                                var int1 = document.getElementById("input1").value;
                                var int2 = document.getElementById("input2").value;
                                var n1 = parseInt(int1);
                                var n2 = parseInt(int2);
                                if ((isNaN(n1)) || (isNaN(n2))) {
                                    document.getElementById("show").setAttribute("color", "red");
                                    show.innerHTML = "ERROR";
                                } else {
                                    s = n1 + n2;
                                    document.getElementById("show").setAttribute("color", "green");
                                    show.innerHTML = s;
                                }
                            }

                            function b() {

                                var int1 = document.getElementById("input1").value;
                                var int2 = document.getElementById("input2").value;
                                var n1 = parseInt(int1);
                                var n2 = parseInt(int2);
                                if ((isNaN(n1)) || (isNaN(n2))) {
                                    document.getElementById("show").setAttribute("color", "red");
                                    show.innerHTML = "ERROR";
                                } else {
                                    s = n1 - n2;
                                    document.getElementById("show").setAttribute("color", "green");
                                    show.innerHTML = s;
                                }
                            }

                            function c() {

                                var int1 = document.getElementById("input1").value;
                                var int2 = document.getElementById("input2").value;
                                var n1 = parseInt(int1);
                                var n2 = parseInt(int2);
                                if ((isNaN(n1)) || (isNaN(n2))) {
                                    document.getElementById("show").setAttribute("color", "red");
                                    show.innerHTML = "ERROR";
                                } else {
                                    s = n1 * n2;
                                    document.getElementById("show").setAttribute("color", "green");
                                    show.innerHTML = s;
                                }
                            }

                            function d() {

                                var int1 = document.getElementById("input1").value;
                                var int2 = document.getElementById("input2").value;
                                var n1 = parseInt(int1);
                                var n2 = parseInt(int2);
                                if ((isNaN(n1)) || (isNaN(n2))) {
                                    document.getElementById("show").setAttribute("color", "red");
                                    show.innerHTML = "ERROR";
                                } else {
                                    s = n1 / n2;
                                    document.getElementById("show").setAttribute("color", "green");
                                    show.innerHTML = s;
                                }
                            }
                            </script>


                            <center>
                                ช่อง1 : <input id="input1" name="input1" size="10" /><br />
                                ช่อง2 : <input id="input2" name="input2" size="10" /><br />
                                ผลลัพธ์ : <font id="show" color=""></font> <br />

                                <button onclick="javascript: a();">+</button>
                                <button onclick="javascript: b();">-</button>
                                <button onclick="javascript: c();">x</button>
                                <button onclick="javascript: d();">/</button>
                            </center>


                        </div>
                        footer
                    </div>
                    <!-- /.box -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

</body>

</html>

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
$(document).ready(function() {
    $('.sidebar-menu').tree()
})
</script>