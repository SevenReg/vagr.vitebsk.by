<? 
  //print $_SERVER['REMOTE_ADDR'];
  $my=new class_out;
  $my->sql_connect();  
  
?>

<script type="text/javascript">


function dis(nameEl){
document.getElementById(nameEl).disabled = false; return false;
}

</script>

<TABLE width="976" BORDER="0" cellspacing="0" cellpadding="5"> 
	<TR>
		<TD align="left" valign="top"><div class="taxonomy"><div class="tax0"><A href="" tppabs="http://www.vagr.vitebsk.by/">�������</A></div><div class="tax1"><A href="">������ ��� ��������</A></div></div>
	   </TD>
	</TR>
	<TR>
		<TD align="center" valign="top">
             <div class="td1"><H1>������</H1></div>
        </TD>
	</TR>
	<TR>
		<TD height="550" align="left" valign="top">
        <div class="td1"><b>��� �������� ��� "��������� ��������� �� ��������������� <br/> ����������� � ���������� ��������"<br/><br/>
        ��������� �������,<br/>������ ��������� ���� ������ � ������ ������ �����������, ��������<br/> ������ � ������ ������ ������� ������, ������� �������������<br/>
        ������ ������</b>
        </div><br/>
         <div class="ctext1">
            <form id="form1" action="?f=messQ" method="POST" class="form_">
         <ol>
            <li><b>� ����� ��������������� ������������� ����������� �� ���������� (������� ���������� �����):</b><br/>
                <? $my->out_departmet(); ?><br/><br/>
            </li>
            <li><b>��� ���� ������� ������������� ������ ��������� � ��� "��������� ��������� �� ��������������� ����������� � ���������� ��������" (�������,����):</b><br/>
                <input type="radio" name="resonQ" value="��������������� ����������� ����������� ���������">&nbsp;��������������� ����������� ����������� ���������<br/>
                <input type="radio" name="resonQ" value="���������� ����������� �������������� ����������� ���������">&nbsp;���������� ����������� �������������� ����������� ���������<br/>
                <input type="radio" name="resonQ" value="������������� ������">&nbsp;������������� ������<br/>
                <input type="radio" name="resonQ" value="������������ �� �������� ����������� �������������� ����������� ���������">&nbsp;������������ �� �������� ����������� �������������� ����������� ���������<br/>                
                <input type="radio" name="resonQ" value="������ �������� ����������� ���������">&nbsp;������ �������� ����������� ���������<br/>
                <input type="radio" name="resonQ" value="������ ��������">&nbsp;������ ��������<br/>
                <input type="radio" name="resonQ" value="���������� ������������������ � ������������� �����">&nbsp;���������� ������������������ � ������������� �����<br/><br/>                
            </li>
            <li><b>���������� �� ��� ������������� ��� � ����� ������ � ������ ����������:</b><br/>
                <input type="radio" name="priemQ" value="��, ����������" onClick="document.getElementById('priemQText').disabled = true; return true;" >&nbsp;��, ����������<br/>
                <input type="radio" name="priemQ" value="���, �� ����������" onClick="dis('priemQText');" >&nbsp;���, �� ���������� (�������, ��� ������)<br/>
                <textarea name="priemQText" cols="3" style="width:450px;" id="priemQText" disabled="disabled"></textarea><br/><br/>
            </li>
            <li><b>������������� �� �� ���������� � ��� ��������������� ������������ �����������:</b><br/>
                <input type="radio" name="relationshipQ" value="��" onClick="document.getElementById('relationshipQText').disabled = true; return true;" >&nbsp;��<br/>
                <input type="radio" name="relationshipQ" value="���" onClick="document.getElementById('relationshipQText').disabled = true; return true;" >&nbsp;���<br/>
                <input type="radio" name="relationshipQ" value="��" onClick="dis('relationshipQText');" >&nbsp;��, �� �����-�� ������� ����� ���� ����� (�������, ��� ������)<br/>
                <textarea name="relationshipQText" cols="3" style="width:450px;" id="relationshipQText" disabled="disabled"></textarea><br/><br/>
            </li>
            <li><b>������������� �� �� ��������� ���������� ����� (�����):</b><br/>
                <input type="radio" name="qualityQ" value="��" onClick="document.getElementById('qualityQText').disabled = true; return true;" >&nbsp;��<br/>
                <input type="radio" name="qualityQ" value="���" onClick="document.getElementById('qualityQText').disabled = true; return true;" >&nbsp;���<br/>
                <input type="radio" name="qualityQ" value="��" onClick="dis('qualityQText');" >&nbsp;��, �� �����-�� ������� ����� ���� ����� (�������, ��� ������)<br/>
                <textarea name="qualityQText" cols="3" style="width:450px;" id="qualityQText" disabled="disabled"></textarea><br/><br/>
            </li>
            <li><b>���������� �� ����������� �� �������������� �������, ��������-����� ���������� � ����������� ������������ ������� (�������):</b><br/>
                 <input type="radio" name="standQ" value="��, ����������" onClick="document.getElementById('standQText').disabled = true; return true;" >&nbsp;��, ����������<br/>
                <input type="radio" name="standQ" value="���, �� ���������� (�������, ��� ������)" onClick="dis('standQText');" >&nbsp;���, �� ���������� (�������, ��� ������)<br/>
                <textarea name="standQText" cols="3" style="width:450px;" id="standQText" disabled="disabled"></textarea><br/><br/>
            </li>
            <li><b>���� ����������� �� ���������������� ������ �����������:</b><br/>
            <textarea name="offersQText" cols="3" style="width:450px;"></textarea>
            </li>                                                
         </ol> 
            <br/>
            <div class="td1"><input type="submit" name="saveQ" value="���������" style="width:200"></div>
            </form>
         </div>
         <br/><br/><br/>
    
		</TD>
	</TR>
</TABLE>