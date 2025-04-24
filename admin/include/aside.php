 <!--aside open-->
 <aside class="app-sidebar">
 	<div class="app-sidebar__user">
 		<div class="dropdown user-pro-body text-center">
 			<div class="nav-link pl-1 pr-1 leading-none ">
 				<img src="./assets/img/avatar/avatar-3.jpeg" alt="user-img" class="avatar-xl rounded-circle mb-1">
 				<span class="pulse bg-success" aria-hidden="true"></span>
 			</div>
 			<div class="user-info">
 				<h6 class=" mb-1 text-dark"><?php if (isset($_SESSION['ADMINID'])) {
													echo $_SESSION['ADMINNAME'];
												} ?></h6>
 				<span class="text-muted app-sidebar__user-name text-sm"> Admin</span>
 			</div>
 		</div>
 	</div>
 	<ul class="side-menu">
 		<li class="slide">
 			<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-laptop"></i><span class="side-menu__label">Dashboard</span><span class="badge badge-orange nav-badge"></span></a>
 			<ul class="slide-menu">
 				<li><a class="slide-item" href="home.php"><span>Dashboard </span></a></li>
 			</ul>
 		</li>
 		<li>
 			<a class="side-menu__item" href="./manage_brands.php"><i class="side-menu__icon fa fa-angellist"></i><span class="side-menu__label">Manage Brands</span></a>
 		</li>
 		<li>
 			<a class="side-menu__item" href="./manage_category.php"><i class="side-menu__icon fa fa fa-list-alt"></i><span class="side-menu__label">Manage Category</span></a>
 		</li>
 		<li>
 			<a class="side-menu__item" href="./manage_products.php"><i class="side-menu__icon fa fa-product-hunt"></i><span class="side-menu__label">Manage Products</span></a>
 		</li>
		 <li>
 			<a class="side-menu__item" href="./manage_customers.php"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Manage Customers</span></a>
 		</li>
		 <li>
 			<a class="side-menu__item" href="./manage_orders.php"><i class="side-menu__icon fa fa-bell"></i><span class="side-menu__label">Orders</span></a>
 		</li>
 	</ul>
 </aside>
 <!--aside closed-->