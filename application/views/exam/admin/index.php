<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>题库上传</title>
  </head>
  <body>
    <?php echo $error;?>
    <?php echo form_open_multipart('./Exam/ImportWriting');?>
    <input type="file" name="userfile" size="20" />
    <br /><br />
    <input type="submit" value="upload" />
    </form>
  </body>
</html>
