<style>
  .main-sidebar {
    background-color: #FFF; /* Ubah warna sesuai keinginan Anda */
  }

  .nav-sidebar .nav-link {
    color: #333333; /* Ubah warna sesuai keinginan Anda */
  }

  .nav-sidebar .nav-link:hover {
    color: #E26A6A; /* Ubah warna sesuai keinginan Anda */
  }

  .nav-sidebar .nav-link.active {
    color: #E26A6A; /* Ubah warna sesuai keinginan Anda */
  }

  .sidebar-dark-primary .nav-sidebar>.nav-item.has-treeview>.nav-link:before,
  .sidebar-dark-primary .nav-sidebar>.nav-link:before {
    color: #333333; /* Ubah warna sesuai keinginan Anda */
  }

  .sidebar-dark-primary .nav-sidebar .nav-treeview>.nav-item>.nav-link,
  .sidebar-dark-primary .nav-sidebar .nav-treeview>.nav-item>.nav-link:hover {
    color: #333333; /* Ubah warna sesuai keinginan Anda */
  }

  /* Tambahkan style ini untuk mengubah background color saat menu aktif */
  .sidebar-dark-primary .nav-sidebar .nav-treeview>.nav-item.has-treeview.menu-open>.nav-link,
  .sidebar-dark-primary .nav-sidebar .nav-treeview>.nav-item.active>.nav-link {
    background-color: #D1E6F3; /* Ubah warna sesuai keinginan Anda */
    color: #333333; /* Ubah warna teks sesuai keinginan Anda */
  }

  .test {
    background-color: #D1E6F3;
  }
</style>

  
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route("dashboard") }}" class="brand-link">
      <img id="logo-image" src="{{ asset('')}}assets/logo/logo-synthesis.png" width="150px" alt="Synthesis Development">
      <span class="brand-text font-weight-light">&nbsp; </span>
    </a>
    

    <!-- Sidebar -->
    <div class="sidebar" >

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          
          <li class="nav-item">
            <a style="color: black" href="{{ route("dashboard") }}" class="nav-link{{ request()->is('dashboard') ? ' active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          @if(Auth::user()->is_monitoring == true)
            <li class="nav-item">
              <a style="color: black" href="{{ route("document_monitoring") }}" class="nav-link{{ request()->is('document_monitoring') ? ' active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                  Monitoring Dokumen
                </p>
              </a>
            </li>
          @else          
            <li class="nav-item{{ request()->is('ar/*') ? ' menu-open' : '' }}">
              <a style="color: black" href="#" class="nav-link{{ request()->is('ar/*') ? ' active' : '' }}">
                <i class="nav-icon fas fa-globe"></i>
                <p>
                  AR
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview ml-1">

                {{-- menu master --}}
                <li class="nav-item has-treeview{{ request()->is('ar/master*') ? ' menu-open' : '' }}">
                  <a style="color: black" href="#" class="nav-link{{ request()->is('ar/master*') ? ' active' : '' }}">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                      Master
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview ml-1">
                    {{-- <li class="nav-item">
                      <a style="color: black" href="{{ route("master_booking") }}" class="nav-link{{ request()->is('ar/master_booking') ? ' active' : '' }}">
                        <i class="far fa-file nav-icon"></i>
                        <p>Booking</p>
                      </a>
                    </li> --}}
                    
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/jenis_produk') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_jenis_produk") }}" class="nav-link{{ request()->is('ar/master/jenis_produk') ? ' active' : '' }}">
                        
                        <p>Jenis Produk</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/blok') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_blok") }}" class="nav-link{{ request()->is('ar/master/blok') ? ' active' : '' }}">
                        
                        <p>Blok</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/tipe_unit') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_tipe_unit") }}" class="nav-link{{ request()->is('ar/master/tipe_unit') ? ' active' : '' }}">
                        
                        <p>Tipe Unit</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/kode_hadap') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_kode_hadap") }}" class="nav-link{{ request()->is('ar/master/kode_hadap') ? ' active' : '' }}">
                        <p>Kode Hadap</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/kode_info') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_kode_info") }}" class="nav-link{{ request()->is('ar/master/kode_info') ? ' active' : '' }}">
                        <p>Kode Info</p>
                      </a>
                    </li>

                    {{-- <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/kode_berkas_doc') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_kode_berkas_doc") }}" class="nav-link{{ request()->is('ar/master/kode_berkas_doc') ? ' active' : '' }}">
                        <i class="fas fa-info-circle nav-icon"></i>
                        <p>Kode Berkas Doc</p>
                      </a>
                    </li> --}}
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/jenis_faktur') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_jenis_faktur") }}" class="nav-link{{ request()->is('ar/master/jenis_faktur') ? ' active' : '' }}">
                        <p>Jenis Faktur</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/kode_faktur') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_kode_faktur") }}" class="nav-link{{ request()->is('ar/master/kode_faktur') ? ' active' : '' }}">
                        <p>Kode Faktur</p>
                      </a>
                    </li>

                    <li class="nav-item">
                        <hr class="border-top border-black">
                    </li>                
                    
                    
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/jenis_bayar') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_jenis_bayar") }}" class="nav-link{{ request()->is('ar/master/jenis_bayar') ? ' active' : '' }}">
                        <p>Jenis Bayar</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/kode_bayar') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_kode_bayar") }}" class="nav-link{{ request()->is('ar/master/kode_bayar') ? ' active' : '' }}">
                        <p>Kode Bayar</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/kode_bank') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_kode_bank") }}" class="nav-link{{ request()->is('ar/master/kode_bank') ? ' active' : '' }}">
                        <p>Kode Bank</p>
                      </a>
                    </li>

                    <li class="nav-item">
                        <hr class="border-top border-black">
                    </li>
      
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/kode_agama') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_kode_agama") }}" class="nav-link{{ request()->is('ar/master/kode_agama') ? ' active' : '' }}">
                        <p>Kode Agama</p>
                      </a>
                    </li>
      
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/kode_usaha') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_kode_usaha") }}" class="nav-link{{ request()->is('ar/master/kode_usaha') ? ' active' : '' }}">
                        <p>Kode Usaha</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/kode_profesi') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_kode_profesi") }}" class="nav-link{{ request()->is('ar/master/kode_profesi') ? ' active' : '' }}">
                        <p>Kode Profesi</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/kode_kategori') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_kode_kategori") }}" class="nav-link{{ request()->is('ar/master/kode_kategori') ? ' active' : '' }}">
                        <p>Kode Kategori</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/kode_kota') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_kode_kota") }}" class="nav-link{{ request()->is('ar/master/kode_kota') ? ' active' : '' }}">
                        <p>Kode Kota</p>
                      </a>
                    </li>

                    <li class="nav-item">
                        <hr class="border-top border-black">
                    </li>

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/kode_sales') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_kode_sales") }}" class="nav-link{{ request()->is('ar/master/kode_sales') ? ' active' : '' }}">
                        <p>Kode Sales</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/kode_customer') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_kode_customer") }}" class="nav-link{{ request()->is('ar/master/kode_customer') ? ' active' : '' }}">
                        <p>Kode Customer</p>
                      </a>
                    </li>

                    <li class="nav-item">
                        <hr class="border-top border-black">
                    </li>
                    
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/master/bank') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("master_bank") }}" class="nav-link{{ request()->is('ar/master/bank') ? ' active' : '' }}">
                        <p>Bank Retention</p>
                      </a>
                    </li>

                  </ul>
                </li>

                {{-- menu transaksi --}}
                <li class="nav-item has-treeview{{ request()->is('ar/transaction*') ? ' menu-open' : '' }}">
                  <a style="color: black" href="#" class="nav-link{{ request()->is('ar/transaction*') ? ' active' : '' }}">
                    <i class="nav-icon fas fa-exchange-alt"></i>
                    <p>
                      Transaction
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview ml-1">
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/transaction/unit') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("transaction_unit") }}" class="nav-link{{ request()->is('ar/transaction/unit') ? ' active' : '' }}">
                        <p>Unit</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/transaction/booking') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("transaction_booking") }}" class="nav-link{{ request()->is('ar/transaction/booking') ? ' active' : '' }}">
                        <p>Booking / Tanda Jadi</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/transaction/ppjb') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("transaction_ppjb") }}" class="nav-link{{ request()->is('ar/transaction/ppjb') ? ' active' : '' }}">
                        <p>PP / PPJB</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/transaction/voucher') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("transaction_voucher") }}" class="nav-link{{ request()->is('ar/transaction/voucher') ? ' active' : '' }}">
                        <p>Voucher</p>
                      </a>
                    </li>
                    {{-- <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/transaction_progress_project') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("transaction_progress_project") }}" class="nav-link{{ request()->is('ar/transaction_progress_project') ? ' active' : '' }}">
                        <i class="fas fa-project-diagram nav-icon"></i>
                        <p>Progress Project</p>
                      </a>
                    </li> --}}

                    <li class="nav-item has-treeview{{ request()->is('ar/transaction/retention*') ? ' menu-open' : '' }}">
                      <a style="color: black" href="#" class="nav-link{{ request()->is('ar/transaction/retention*') ? ' active' : '' }}">
                        <p>
                          Retention
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview ml-1">
                        
                        <li class="nav-item">
                          <a style="color: black{{ request()->is('ar/transaction/retention/progress_project') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("transaction_retention_progress_project") }}" class="nav-link{{ request()->is('ar/transaction/retention/progress_project') ? ' active' : '' }}">
                            <p>Progress Project</p>
                          </a>
                        </li>

                      </ul>
                    </li>


                    {{-- <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/transaction_perubahan_jual') ? '; background-color: #D1E6F3' : '' }}" href="{{ route("transaction_perubahan_jual") }}" class="nav-link{{ request()->is('ar/transaction_perubahan_jual') ? ' active' : '' }}">
                        <i class="fas fa-undo nav-icon"></i>
                        <p>Perubahan Jual</p>
                      </a>
                    </li> --}}

                  </ul>
                </li>

                {{-- menu laporan --}}
                <li class="nav-item has-treeview{{ request()->is('ar/laporan*') ? ' menu-open' : '' }}">
                  <a style="color: black" href="#" class="nav-link{{ request()->is('ar/laporan*') ? ' active' : '' }}">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>
                      Laporan
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview ml-1">

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/laporan_persediaan') ? '; background-color: #D1E6F3' : '' }}" href="{{ route('laporan_persediaan') }}" class="nav-link{{ request()->is('ar/laporan_persediaan') ? ' active' : '' }}">

                        <p>Persediaan Unit</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/laporan_penjualan') ? '; background-color: #D1E6F3' : '' }}" href="{{ route('laporan_penjualan') }}" class="nav-link{{ request()->is('ar/laporan_penjualan') ? ' active' : '' }}">

                        <p>Penjualan</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/laporan_perubahan') ? '; background-color: #D1E6F3' : '' }}" href="{{ route('laporan_perubahan') }}" class="nav-link{{ request()->is('ar/laporan_perubahan') ? ' active' : '' }}">

                        <p>Perubahan</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/laporan_faktur_tagihan') ? '; background-color: #D1E6F3' : '' }}" href="{{ route('laporan_faktur_tagihan') }}" class="nav-link{{ request()->is('ar/laporan_faktur_tagihan') ? ' active' : '' }}">

                        <p>Faktur / Tagihan</p>
                      </a>
                    </li>

                    <li class="nav-item">
                        <hr class="border-top border-black">
                    </li>   
                    
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/laporan_daftar_penerimaan') ? '; background-color: #D1E6F3' : '' }}" href="{{ route('laporan_daftar_penerimaan') }}" class="nav-link{{ request()->is('ar/laporan_daftar_penerimaan') ? ' active' : '' }}">

                        <p>Daftar Penerimaan</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/laporan_piutang') ? '; background-color: #D1E6F3' : '' }}" href="{{ route('laporan_piutang') }}" class="nav-link{{ request()->is('ar/laporan_piutang') ? ' active' : '' }}">

                        <p>Piutang</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/laporan_aging') ? '; background-color: #D1E6F3' : '' }}" href="{{ route('laporan_aging') }}" class="nav-link{{ request()->is('ar/laporan_aging') ? ' active' : '' }}">

                        <p>Aging</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/laporan_pengembalian') ? '; background-color: #D1E6F3' : '' }}" href="{{ route('laporan_pengembalian') }}" class="nav-link{{ request()->is('ar/laporan_pengembalian') ? ' active' : '' }}">

                        <p>Pengembalian</p>
                      </a>
                    </li>

                    <li class="nav-item">
                        <hr class="border-top border-black">
                    </li> 

                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/laporan_ppjb') ? '; background-color: #D1E6F3' : '' }}" href="{{ route('laporan_ppjb') }}" class="nav-link{{ request()->is('ar/laporan_ppjb') ? ' active' : '' }}">

                        <p>PP / PPJB</p>
                      </a>
                    </li>
                    
                    {{-- <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/laporan_berkas_dokumen') ? '; background-color: #D1E6F3' : '' }}" href="{{ route('laporan_berkas_dokumen') }}" class="nav-link{{ request()->is('ar/laporan_berkas_dokumen') ? ' active' : '' }}">

                        <i class="fas fa-folder nav-icon"></i>
                        <p>Berkas Dokumen</p>
                      </a>
                    </li> --}}
                    
                    <li class="nav-item">
                      <hr class="border-top border-black">
                    </li> 
                    
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/laporan_faktur_pajak') ? '; background-color: #D1E6F3' : '' }}" href="{{ route('laporan_faktur_pajak') }}" class="nav-link{{ request()->is('ar/laporan_faktur_pajak') ? ' active' : '' }}">

                        <p>Faktur Pajak</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a style="color: black{{ request()->is('ar/laporan_invoice') ? '; background-color: #D1E6F3' : '' }}" href="{{ route('laporan_invoice') }}" class="nav-link{{ request()->is('ar/laporan_invoice') ? ' active' : '' }}">

                        <p>Invoice</p>
                      </a>
                    </li>

                  </ul>
                </li>


              </ul>
            </li>
          @endif
          
          {{-- <li class="nav-item{{ request()->is('ar/*') ? ' menu-open' : '' }}">
            <a href="#" class="nav-link{{ request()->is('ar/*') ? ' active' : '' }}">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                AR
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-1">
              <li class="nav-item has-treeview{{ request()->is('ar/transaction*') ? ' menu-open' : '' }}">
                <a href="#" class="nav-link{{ request()->is('ar/transaction*') ? ' active' : '' }}">
                  <i class="nav-icon fas fa-exchange-alt"></i>
                  <p>
                    Transaction
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview ml-1">
                  <li class="nav-item">
                    <a href="{{ route("transaction_unit") }}" class="nav-link{{ request()->is('ar/transaction_unit') ? ' active' : '' }}">
                      <i class="fas fa-map-marker-alt nav-icon"></i>
                      <p>Unit</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route("transaction_booking") }}" class="nav-link{{ request()->is('ar/transaction_booking') ? ' active' : '' }}">
                      <i class="fas fa-file-invoice-dollar nav-icon"></i>
                      <p>Booking / Tanda Jadi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route("transaction_ppjb") }}" class="nav-link{{ request()->is('ar/transaction_ppjb') ? ' active' : '' }}">
                      <i class="fas fa-file-invoice-dollar nav-icon"></i>
                      <p>PP / PPJB</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li> --}}
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var pushMenuButton = document.querySelector('.pushmenu-btn');
      var logoImage = document.getElementById('logo-image');
  
      pushMenuButton.addEventListener('click', function() {
        if (logoImage.getAttribute('src') === "{{ asset('')}}assets/logo/logo-synthesis.png") {
          logoImage.setAttribute('src', "{{ asset('')}}assets/logo/logo-synthesis-s.png");
          logoImage.style.width = '35px';
        } else {
          logoImage.setAttribute('src', "{{ asset('')}}assets/logo/logo-synthesis.png");
          logoImage.style.width = '150px';
        }
      });
    });
  </script>