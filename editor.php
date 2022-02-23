<script src="ckeditor/ckeditor.js" ></script>
                       <div class="col-lg-12 col-xs-12 form-group">

                         Interview Question Name:
                         <textarea id='short_desc' name="short_desc" style='border: 1px solid black;' readonly  ><?php echo $row['title_name'];?> </textarea><br>
                         Detailled Description:
                         	<textarea id='long_desc' name='long_desc' ></textarea><br>


                       </div>
                       <script src="ckeditor/ckeditor.js" ></script>
<!-- Script -->
<script type="text/javascript">

  // Initialize CKEditor
  CKEDITOR.inline( 'short_desc');

  CKEDITOR.replace('long_desc',{

    width: "500px",
        height: "200px"

  });


</script>