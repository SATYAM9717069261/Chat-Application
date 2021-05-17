     function chk_pas() {
         var pos = 0;
         var str = document.getElementById('F_Pas').value;
         for (var i = 1; i <= 9; i++) {
             pos = str.search(i);
             if (pos >= 0) break;
             else pos = -1;
         }
         if (pos >= 0) {
             document.getElementById('num').checked = true;
             document.getElementById('num_lbl').style.backgroundColor = "cornflowerblue";

         } else {
             document.getElementById('num').checked = false;
             document.getElementById('num_lbl').style.backgroundColor = "indianred";
         }
         //check upper case char
         var chk_Uper_var = 0;
         var charac = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
         for (var ch = 0; ch < charac.length; ch++) {
             if (str.search(charac[ch]) >= 0) {
                 chk_Uper_var = 1;
                 break;
             } else
                 chk_Uper_var = -1;
         }
         if (chk_Uper_var == 1) {
             document.getElementById('up_cas').checked = true;
             document.getElementById('uper_lbl').style.backgroundColor = "cornflowerblue";
         } else {
             document.getElementById('up_cas').checked = false;
             document.getElementById('uper_lbl').style.backgroundColor = "indianred";
         }
     }


     function chk_pas_mat() {
         if ((document.getElementById('F_Pas').value == document.getElementById('S_Pas').value) && (document.getElementById('S_Pas').value != '')) {
             document.getElementById('match_pas').checked = true;
             document.getElementById('lbl_match').style.backgroundColor = "cornflowerblue";
         } else {
             document.getElementById('match_pas').checked = false;
             document.getElementById('lbl_match').style.backgroundColor = "indianred";
         }

     }

     function chk_phon() {
         if (document.getElementById('phone').value.length == 10) {
             document.getElementById('phone').style.borderColor = "green";
             document.getElementById('chk_pho').style.backgroundImage = "url(svg/002-tick-sign.svg)";
         } else { document.getElementById('phone').style.borderColor = "red"; }
     }

     function chk_mail() {
         var sarch = document.getElementById('mail').value;
         if (sarch.search("@gmail.com") >= 0) {
             document.getElementById('mail').style.borderColor = "green";
             document.getElementById('mail_img').style.backgroundImage = "url(svg/002-tick-sign.svg)";
         } else { document.getElementById('mail').style.borderColor = "red"; }
     }

     function hideDialog() {
         var whitebg = document.getElementById("outer_page");
         var dlg = document.getElementById("inner_page");
         whitebg.style.display = "none";
         dlg.style.display = "none";
         document.getElementById('main_reg').Full_Name.disabled = false;
         document.getElementById('main_reg').F_Pas.disabled = false;
         document.getElementById('main_reg').S_Pass.disabled = false;
         document.getElementById('main_reg').mail.disabled = false;
         document.getElementById('main_reg').phone.disabled = false;
         document.getElementById('main_reg').sub_form.disabled = false;
     }

     function showDialog_onpage() {
         var whitebg = document.getElementById("outer_page");
         var dlg = document.getElementById("inner_page");
         whitebg.style.display = "block";
         dlg.style.display = "block ";
         var winWidth = window.innerWidth;
         var winheight = window.innerHeight;
         dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
         dlg.style.top = "150px";
         document.getElementById('main_reg').Full_Name.disabled = true;
         document.getElementById('main_reg').F_Pas.disabled = true;
         document.getElementById('main_reg').S_Pass.disabled = true;
         document.getElementById('main_reg').mail.disabled = true;
         document.getElementById('main_reg').phone.disabled = true;
         document.getElementById('main_reg').sub_form.disabled = true;
         document.getElementById("log_short").focus();
     }