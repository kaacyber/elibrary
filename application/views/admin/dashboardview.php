<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$judul;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=base_url();?>konten/fonts/css/fonts.css">
    <link rel="stylesheet" href="<?=base_url();?>konten/tema/lte/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>konten/tema/lte/plugins/font-awesome/css/font-awesome.min.css">    
    <link rel="stylesheet" href="<?=base_url();?>konten/tema/lte/plugins/ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url();?>konten/tema/lte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url();?>konten/tema/lte/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?=base_url();?>konten/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?=base_url();?>konten/tema/lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function () {
		if($("#message_header").length)
		{
			setTimeout(function(){
				$("#message_header").hide("fade");
			},3000);
		}
	});
	</script>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?=base_url(akses());?>/dashboard" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="<?=base_url();?>img/pemprov.png" widht="40" height="40"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>E</b>Library</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">             
              <!-- User Account: style can be found in dropdown.less -->
              
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?=user_avatar();?>" class="user-image image_avatar" alt="User Image">
                  <span class="hidden-xs"><?=user_info('nama');?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?=user_avatar();?>" class="img-circle image_avatar" alt="User Image">
                    <p>
                      <?=user_info('nama');?>
                    </p>
                  </li>                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?=base_url();?>profil" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?=base_url();?>logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>              
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=user_avatar();?>" class="img-circle image_avatar" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?=user_info('nama');?></p>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?=base_url(akses().'/dashboard');?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>              
            </li>
            <?php            
			require_once APPPATH.'views/'.akses().'/nav.php';
			$output='';
			foreach($menu as $m1=>$r1)
			{	
				$a=menu_active($r1['slug']);
				$s1="";
				$s2="";
				if($a==TRUE)
				{
					$s1="active";
					$s2="treeview";
				}
				if(empty($r1['child']))
				{
					$output.='<li class="treeview '.$s1.'">
					<a href="'.$r1['url'].'">							
						<i class="'.$r1['icon'].'"></i> <span>'.$m1.'</span>
					</a></li>';
				}else{
					$output.='<li class="treeview '.$s1.'">';
					$output.='<a href="#" data-toggle="dropdown">
						<i class="'.$r1['icon'].'"></i> <span>'.$m1.'</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>';
					$output.='<ul class="treeview-menu">';
					foreach($r1['child'] as $m2=>$r2)
					{
						$output.='<li><a href="'.$r2['url'].'">'.$m2.'</a></li>';
					}
					$output.='</ul>';
					$output.='</li>';
				}	
			}
			echo $output;
			?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?=$judul;?>
          </h1>          
        </section>

        <!-- Main content -->
        <section class="content">
<?php
$msgHeader=$this->session->flashdata('message_header');
if(!empty($msgHeader))
{
$msgTipe=$msgHeader['tipe'];
$msgIcon="";
switch($msgTipe){
		case "danger":
			$msgIcon="fa-ban";
			break;						
		case "success":
			$msgIcon="fa-check";
			break;
		case "warning":
			$msgIcon="fa-warning";
			break;
		case "info":
			$msgIcon="fa-info";
			break;
	}
?>
<div class="alert alert-<?=$msgTipe;?> alert-dismissable" id="message_header">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><?=$msgHeader['title'];?></h4>
    <?=$msgHeader['message'];?>
</div>				                
<?php	
}
?>
              
            







<!-- Content Wrapper. Contains page content -->
  

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-book-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Buku</span>
              <span class="info-box-number"><?=$buku;?><small> Buku</small></span>
              <span class="info-box-number" ><a href="<?=base_url(akses());?>/elibrary/load_buku"><small> Lihat Detail</small></a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Regulasi</span>
              <span class="info-box-number" ><?=$regulasi;?><small> Regulasi</small></span>
              <span class="info-box-number" ><a href="<?=base_url(akses());?>/elibrary/load_regulasi"><small> Lihat Detail</small></a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Penelitian</span>
              <span class="info-box-number"><?=$penelitian;?><small> Penelitian</small></span>
              <span class="info-box-number" ><a href="<?=base_url(akses());?>/elibrary/load_penelitian"><small> Lihat Detail</small></a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-desktop"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Laporan Khusus</span>
              <span class="info-box-number"><?=$khusus;?></span>
              <span class="info-box-number" ><a href="<?=base_url(akses());?>/elibrary/load_khusus"><small> Lihat Detail</small></a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="box-body">
          
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: 400px">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="<?php echo base_url(); ?>img/slide1.jpg" alt="First slide" style="width: 100%; height: 100%;">

                    <div class="carousel-caption">
                      First Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="<?php echo base_url(); ?>img/slide2.jpg" alt="Second slide" style="width: 100%; height: 100%;">

                    <div class="carousel-caption">
                      Second Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="<?php echo base_url(); ?>img/slide3.jpg" alt="Third slide" style="width: 100%; height: 100%;">

                    <div class="carousel-caption">
                      Third Slide
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>  
        </div>
      </div>

  
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



      <footer class="main-footer hidden-print">
        <div class="pull-right hidden-xs">
          
        </div>
        <strong>Copyright &copy;.</strong> All rights reserved.
      </footer>
      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url();?>konten/tema/lte/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url();?>konten/tema/lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url();?>konten/tema/lte/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url();?>konten/tema/lte/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url();?>konten/tema/lte/dist/js/demo.js"></script>
  </body>
</html>