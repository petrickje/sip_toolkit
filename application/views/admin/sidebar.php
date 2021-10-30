 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="<?php echo base_url('welcome/admin'); ?>" class="brand-link">
     <img src="<?php echo base_url('dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .5">
     <span class="brand-text font-weight-light">SIP Toolkit</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="<?php echo base_url('dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">
           <?php

            foreach ($user as $row) {
              echo $row->nama;
            }
            ?>

         </a>
       </div>
     </div>



     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item menu-open">
           <a href="#" class="nav-link active">
             <i class="fas fa-toolbox"></i>
             <p>
               Toolkit
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?php echo base_url("Welcome/admin"); ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p> Seluruh Toolkit</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?php echo base_url("Admin/dipinjam"); ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p> Toolkit Dipinjam</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?php echo base_url("Admin/tersedia"); ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p> Toolkit Tersedia</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="<?php echo base_url("toolkit/daftar_form_peminjaman"); ?>" class="nav-link">
             <i class="fas fa-clipboard-list"></i>
             <p>
               Daftar Form Pengajuan
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?php echo base_url("Admin/riwayat_peminjaman"); ?>" class="nav-link">
             <i class="fas fa-history"></i>
             <p>
               Riwayat Peminjaman
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?php echo base_url('toolkit/pendaftaran'); ?>" class="nav-link">
             <i class="fas fa-archive"></i>
             <p>
               Pendaftaran Toolkit
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?php echo base_url('akun/update_admin'); ?>" class="nav-link">
             <i class="fas fa-user-cog"></i>

             <p>
               Kelola Akun
             </p>
           </a>
         </li>

         <li class="nav-item">
           <a href="<?php echo base_url('Login/logout'); ?>" class="nav-link">
             <i class="fas fa-sign-out-alt"></i>
             <p>
               Logout
             </p>
           </a>
         </li>


       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>