<div class="form-group">
  <label for="title">Title:</label>
  <input class="form-control" type="text" name="title" id="title" placeholder="titleを入力してね">
</div>


<div class="form-group">
    <label for="pdfs">PDFファイル:</label>
    <div id="btnpdf">
      ここにPDFファイル（複数可）をドラッグ＆ドロップしてください<br>
      WindowsのInternet ExplorerとMicrosoft Edgeではドラッグ＆ドロップはできません．<br>
      クリックして表示されるファイル選択ダイアログからファイルを選択してください<br>
      <br>
      <input type="file" size="80", id="pdfs" name="pdfs[]" multiple required>
      <div id="property"></div>
    </div>
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary form-control"><span class="glyphicon glyphicon-cloud-upload" ></span> Register New Papers</button>
</div>
