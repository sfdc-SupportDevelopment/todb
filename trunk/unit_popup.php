<?php 
// added above HTML AEC 15.4.10
require('config/config.inc');
?>
<html>
<head>
<title>update unit</title>
<script type=text/javascript>
<!--

<?php 
//require('config/config.inc');
// this provides the hoover_form_state() and view_units_fix_state() functions
require('popup_form_state.inc');
?>

function cancelme()
{
   this.opener.selected.numlines=0
   self.close()
}  

<?php
require('scroll_java.inc');
?>

//-->
</script>
</head>
<body>

<script type=text/javascript>
<!--
   this.document.write('<form method=post action="')
   this.document.write(this.opener.location.href)
   this.document.write('" target="<?php echo "$windowid"; ?>"')
   this.document.writeln(' onsubmit="javascript:setTimeout(\'self.close()\', 250)">')
//-->
</script>
<table rules=groups>
<thead><tr>
<th><font size=-1>Del?</font></th>
<?php
require('config/units.inc');
foreach ($updateableadminunitcolshdr as $unititem) {
   echo "<th>".$unititem."</th>\n";
}
?>
</tr><thead><tbody>
<script type=text/javascript>
<!-- 
var idlist
var separator
idlist=''
separator=''
for (i=1; i<= this.opener.selected.numlines; i++) {
   this.document.write('<tr>')
   this.document.write('<td><input type="checkbox" name="deleted_')
   this.document.write(this.opener.selected.id[i])
   if (this.opener.selected.deleted[i] == 1) {
      this.document.write('" checked=true')
   } else {
      this.document.write('"')
   } 
   this.document.write(' value="Delete line"></td>')		 
<?php
$unitcol = 0;
foreach ($updateableadminunitcols as $unititem) { 
   $fieldwidth=$adminunitcolwidths[$unitcol++];
   if (($unititem == 'running') || ($unititem == 'global')) {
      echo "this.document.write('<td><input type=\"checkbox\" ')\n";
      echo "this.document.write('name=\"".$unititem."_')\n";
      echo "this.document.write(this.opener.selected.id[i])\n";
      echo "if (this.opener.selected.".$unititem."[i] == 1) {\n";
      echo "   this.document.write('\" checked=true')\n";
      echo "} else {\n";
      echo "   this.document.write('\"')\n";
      echo "}\n";
      echo "this.document.write('\" value=\"1\"></td>')\n";

   } else {
      echo "this.document.write('<td><input type=text size=\"')\n";
      echo "this.document.write('".$fieldwidth."\" name=\"".$unititem."_')\n";
      echo "this.document.write(this.opener.selected.id[i])\n";
      echo "this.document.write('\" value=\"')\n";
      echo "this.document.write(this.opener.selected.".$unititem."[i])\n";
      echo "this.document.write('\"></td>')\n";
   } 
}
?>
   this.document.write('</tr>')
   idlist = idlist+separator+this.opener.selected.id[i]
   separator = '+'
}
this.document.write('<input type="hidden" name="idlist" value="')
this.document.write(idlist)
this.document.writeln('">')
this.document.write('<input type="hidden" name="origxscroll" value="')
this.document.write(getxscroll(this.opener.window))
this.document.writeln('">')
this.document.write('<input type="hidden" name="origyscroll" value="')
this.document.write(getyscroll(this.opener.window))
this.document.writeln('">')

//-->
</script>
</tbody>
</table>
<input type="hidden" name="windowid" value="<?php echo "$windowid"; ?>">
<p><input type="submit" name="UnitEdit" value="Apply">&nbsp;
<input type="button" name="cancel" value="Cancel" onclick="cancelme()"></p>

<script type=text/javascript>
<!--

hoover_form_state()
view_units_state_fix()

//-->
</script>

</form>


</body></html>

<?php
require('resize_popup.inc')
?>
