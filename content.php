<?php
if ($_GET['modul']=='home'){  
    include "dashboard.php";  
}
elseif ($_GET['modul']=='kasir'){  
    include "modul/kasir/kasir.php";  
}
elseif ($_GET['modul']=='waitress'){  
    include "modul/waitress/waitress.php";  
}
elseif ($_GET['modul']=='diskon'){  
    include "modul/pesanan/diskon.php";  
}
elseif ($_GET['modul']=='kategori'){  
    include "modul/kategori/kategori.php";  
}
elseif ($_GET['modul']=='bahan'){  
    include "modul/bahan/bahan.php";
	}
elseif ($_GET['modul']=='satuan'){  
    include "modul/satuan/satuan.php";  
}
elseif ($_GET['modul']=='meja'){  
    include "modul/meja/entrimeja.php"; 
}
elseif ($_GET['modul']=='menu'){  
    include "modul/menu/menu.php"; 
}
elseif ($_GET['modul']=='belibahan'){  
    include "modul/belibahan/belibahan.php"; 
}
elseif ($_GET['modul']=='cetak'){  
    include "modul/pesanan/cetak.php";  
}
elseif ($_GET['modul']=='bayar'){  
    include "modul/pesanan/bayar.php";  
}
elseif ($_GET['modul']=='kamar'){  
    include "modul/kamar/kamar.php";  
}
elseif ($_GET['modul']=='ket'){  
    include "modul/pasien/ket.php";  
}
elseif ($_GET['modul']=='u_posisi'){  
    include "modul/list_order/update_posisi.php";  
}
elseif ($_GET['modul']=='cek_in'){  
    include "modul/cek_in/cek_in.php";  
}
elseif ($_GET['modul']=='pelayanan'){  
    include "modul/pelayanan/pelayanan.php";  
}
elseif ($_GET['modul']=='pelayanan_inap'){  
    include "modul/pelayanan_inap/pelayanan.php";  
} 
elseif ($_GET['modul']=='kartu'){  
    include "modul/pelayanan_inap/kartu.php";  
}  
elseif ($_GET['modul']=='detil_inap'){  
    include "modul/pelayanan_inap/detil.php";  
}
elseif ($_GET['modul']=='detil'){  
    include "modul/pelayanan/detil.php";  
} 
elseif ($_GET['modul']=='kartu_p'){  
    include "modul/pelayanan/kartu.php";  
} 
elseif ($_GET['modul']=='cek_out'){  
    include "modul/cek_out/cek_out.php";  
}
elseif ($_GET['modul']=='out_detail'){  
    include "modul/cek_out/out_detail.php";  
} 
elseif ($_GET['modul']=='m_menu'){  
    include "main_chart_menu.php";  
} 
elseif ($_GET['modul']=='m_waitress'){  
    include "main_chart_waitress.php";  
} 
elseif ($_GET['modul']=='m_bahan'){  
    include "main_chart_belibahan.php";  
} 
elseif ($_GET['modul']=='m_pesanan'){  
    include "main_chart_pesanan.php";  
} 
elseif ($_GET['modul']=='m_pendapatan'){  
    include "main_chart_pendapatan.php";  
} 
elseif ($_GET['modul']=='user'){  
    include "modul/user/user.php";  
}  
elseif ($_GET['modul']=='kwitansi'){  
    include "modul/pesanan/kwitansi.php";  
} 
elseif ($_GET['modul']=='logout'){  
    include "logout.php";  
}
elseif ($_GET['modul']=='login'){  
    include "login.php";  
}  
elseif ($_GET['modul']=='viewmeja'){  
    include "modul/meja/meja.php";  
} 
elseif ($_GET['modul']=='pesan'){  
    include "modul/pesanan/Backuppesanan.php";  
} 
?>