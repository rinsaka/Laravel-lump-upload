// ファイルを選択したときに，その情報を表示する

var pdfs = document.getElementById("btnpdf");
var property = document.getElementById("property");

btnpdf.addEventListener("change", function(evt){
  var file = evt.target.files;  //選択ファイルを配列形式で取得
  var num  = file.length;       //選択されたファイル数を格納
  var str = "";                 //ファイル情報を格納する変数
  var cnt_err = 0;              //PDF以外のファイルが指定された数を格納

  for(var i = 0 ; i < num ; i++) {
    str += "[File no." + parseInt(i+1) + "] ";
    // ファイルタイプのチェック
    if(file[i].type == "application/pdf") {
    } else {
      str += "＊＊＊このファイルはアップロードできません＊＊＊<br>";
      cnt_err++;
    }

    str += "ファイル名：" + file[i].name + "<br>";
  }

  property.innerHTML = str;
  property.style.backgroundColor = "#EEEEEE";

  if(num > 100){
    alert("最大100個までにして下さい\n（get_fileinfo.gs）");
  } else if(cnt_err > 0) {
    alert("PDF以外のファイルが指定されています．アップロードできません．");
  }

},false);
