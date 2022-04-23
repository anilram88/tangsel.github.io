// Chart Fit On Size 
window.onload = function () {
    var chart = new OrgChart(document.getElementById("tree"), {
    scaleInitial: OrgChart.match.boundary,
    enableSearch: true,
        template: "mila",                  
        nodeBinding: {
            field_0: "name",
            field_1: "title",
            img_0: "img"
        }
    });  
  
    // chart.on('render', function(sender, args){
    //   args.content += '<g><circle fill="#039BE5" cx="10" cy="10" r="10"></circle><text fill="#ccc" x="25" y="15" >Manager</text><circle fill="#F57C00" cx="10" cy="40" r="10"></circle><text fill="#ccc"  x="25" y="45" >Sales</text><circle fill="#FFCA28" cx="10" cy="70" r="10"></circle><text fill="#ccc" x="25" y="75" >IT</text></g>';
    // });
  
  
    chart.load([
        { id: 1, tags: ["Kepala Dinas"], name: "Drs.H Dedi Budiawan, MM", title: "Kepala Dinas", img: "../asset/images/lo_tangsel.png" },
        { id: 2, pid: 1, tags: ["assistant"], name: "", title: "Jabatan Fungsional", img: "../asset/images/lo_tangsel.png" },

        { id: 3, pid: 1, tags: ["assistant"], name: "Ucok A.H Siagian, SE, MSI", title: "Sekretaris", img: "../asset/images/lo_tangsel.png" },
        { id: 4, pid: 3, name: "Anasih,S.Pd,MM", title: "Kepala Sub Bagian Umum dan Kepegawaian", img: "../asset/images/lo_tangsel.png" },
        { id: 5, pid: 3, name: "Yahya Sopian, ST", title: "Kepala Sub Bagian Keuangan", img: "../asset/images/lo_tangsel.png" },
        { id: 6, pid: 3, name: "Agustina Marthanelli,S.Kom", title: "Kepala Sub Bagian Perencanaan", img: "../asset/images/lo_tangsel.png" },

        { id: 7, pid: 1, name: "Heru Sudarmanto,S.I, MM", title: "Kepala Bidang Pelayanan Pendaftaran", img: "../asset/images/lo_tangsel.png" },
        { id: 8, pid: 7, name: "Mira Anggareni,SE", title: "Kepala Seksi Identitas Penduduk", img: "../asset/images/lo_tangsel.png" },
        { id: 9, pid: 8, name: "Tuti Suraningsih,S.Sos", title: "Kepala Seksi Pindah Datang Penduduk", img: "../asset/images/lo_tangsel.png" },
        { id: 10, pid: 9, name: "Diana Ermayanti,S.Sos,M.Si", title: "Kepala Seksi Pendataan Penduduk", img: "../asset/images/lo_tangsel.png" },

        { id: 11, pid: 1, name: "Sri Mulyanih,S.Sos", title: "Kepala Bidang Pelayanan Pencatatan Sipil", img: "../asset/images/lo_tangsel.png" },
        { id: 12, pid: 11, name: "Indana Dalianti,AMP", title: "Kepala Seksi Kelahiran", img: "../asset/images/lo_tangsel.png" },
        { id: 13, pid: 12, name: "Filipe Da Kosta,S.STP,M.Si", title: "Kepala Seksi Perkawinan dan Perceraian", img: "../asset/images/lo_tangsel.png" },
        { id: 14, pid: 13, name: "Hj. Farah Diba,SE", title: "Kepala Seksi Perubahan Status Anak", img: "../asset/images/lo_tangsel.png" },

        { id: 15, pid: 1, name: "Yoyoh Rohaeti,S.Sos,M.Si", title: "Kepala Bidang Pengelolaan Informasi", img: "../asset/images/lo_tangsel.png" },
        { id: 16, pid: 15, name: "Dian Nugraha,S.Kom", title: "Kepala Seksi Sistem Informasi Adm Kependudukan", img: "../asset/images/lo_tangsel.png" },
        { id: 17, pid: 16, name: "Idza Fariha Aprih,S.Si", title: "Kepala Seksi Pengolahan dan Penyajian Data", img: "../asset/images/lo_tangsel.png" },
        { id: 18, pid: 17, name: "Rendi Heryandi,SE,M.Si", title: "Kepala Seksi Tata Kelola dan Sumber Daya Manusia", img: "../asset/images/lo_tangsel.png" },

        { id: 19, pid: 1, name: "Hadi Luthfie Achfas, SH", title: "Kepala Bidang Pemanfaatan Data dan Inovasi", img: "../asset/images/lo_tangsel.png" },
        { id: 20, pid: 19, name: "Muhammad Diding Sayyidi,S.Ip", title: "Seksi Kerjasama", img: "../asset/images/lo_tangsel.png" },
        { id: 21, pid: 20, name: "Kartono,S.Ip,M.Si", title: "Seksi Pemanfaatan Data dan Dokumen Kependudukan", img: "../asset/images/lo_tangsel.png" },
        { id: 22, pid: 21, name: "Mega Putri,S.STP,MM", title: "Seksi Inovasi Pelayanan", img: "../asset/images/lo_tangsel.png" },
  
  
  
    ]);   
    
    var timeout = null;    
    
    window.addEventListener('resize', function(){    
      if (timeout){
        clearTimeout(timeout)
      }
      timeout = setTimeout(function(){
        chart.fit();
      }, 500);
    })
  
  };
  
