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
		<TD align="left" valign="top"><div class="taxonomy"><div class="tax0"><A href="" tppabs="http://www.vagr.vitebsk.by/">Главная</A></div><div class="tax1"><A href="">Анкета для клиентов</A></div></div>
	   </TD>
	</TR>
	<TR>
		<TD align="center" valign="top">
             <div class="td1"><H1>Анкета</H1></div>
        </TD>
	</TR>
	<TR>
		<TD height="550" align="left" valign="top">
        <div class="td1"><b>для клиентов РУП "Витебское агентство по государственной <br/> регистрации и земельному кадастру"<br/><br/>
        Уважаемые клиенты,<br/>просим высказать свое мнение о работе нашего предприятия, заполнив<br/> анкету и выбрав нужный вариант ответа, который соответствует<br/>
        Вашему мнению</b>
        </div><br/>
         <div class="ctext1">
            <form id="form1" action="?f=messQ" method="POST" class="form_">
         <ol>
            <li><b>В какое территориальное подразделение предприятия Вы обратились (указать населенный пункт):</b><br/>
                <? $my->out_departmet(); ?><br/><br/>
            </li>
            <li><b>Чем была вызвана необходимость Вашего обращения в РУП "Витебское агентство по государственной регистрации и земельному кадастру" (филиалы,бюро):</b><br/>
                <input type="radio" name="resonQ" value="Государственная регистрация недвижимого имущества">&nbsp;Государственная регистрация недвижимого имущества<br/>
                <input type="radio" name="resonQ" value="Проведение технической инвентаризации недвижимого имущества">&nbsp;Проведение технической инвентаризации недвижимого имущества<br/>
                <input type="radio" name="resonQ" value="Удостоверение сделки">&nbsp;Удостоверение сделки<br/>
                <input type="radio" name="resonQ" value="Консультации по вопросам технической инвентаризации недвижимого имущества">&nbsp;Консультации по вопросам технической инвентаризации недвижимого имущества<br/>                
                <input type="radio" name="resonQ" value="Оценка объектов недвижимого имущества">&nbsp;Оценка объектов недвижимого имущества<br/>
                <input type="radio" name="resonQ" value="Услуги риэлтера">&nbsp;Услуги риэлтера<br/>
                <input type="radio" name="resonQ" value="Выполнение землеустроительных и геодезических работ">&nbsp;Выполнение землеустроительных и геодезических работ<br/><br/>                
            </li>
            <li><b>Устраивает ли Вас установленные дни и время приема и выдачи документов:</b><br/>
                <input type="radio" name="priemQ" value="Да, устраивает" onClick="document.getElementById('priemQText').disabled = true; return true;" >&nbsp;Да, устраивает<br/>
                <input type="radio" name="priemQ" value="Нет, не устраивает" onClick="dis('priemQText');" >&nbsp;Нет, не устраивает (указать, что именно)<br/>
                <textarea name="priemQText" cols="3" style="width:450px;" id="priemQText" disabled="disabled"></textarea><br/><br/>
            </li>
            <li><b>Удовлетворены ли Вы отношением к Вам соответствующих специалистов предприятия:</b><br/>
                <input type="radio" name="relationshipQ" value="Да" onClick="document.getElementById('relationshipQText').disabled = true; return true;" >&nbsp;Да<br/>
                <input type="radio" name="relationshipQ" value="Нет" onClick="document.getElementById('relationshipQText').disabled = true; return true;" >&nbsp;Нет<br/>
                <input type="radio" name="relationshipQ" value="Да" onClick="dis('relationshipQText');" >&nbsp;Да, но какие-то моменты могли быть лучше (указать, что именно)<br/>
                <textarea name="relationshipQText" cols="3" style="width:450px;" id="relationshipQText" disabled="disabled"></textarea><br/><br/>
            </li>
            <li><b>Удовлетворены ли вы качеством выполненых работ (услуг):</b><br/>
                <input type="radio" name="qualityQ" value="Да" onClick="document.getElementById('qualityQText').disabled = true; return true;" >&nbsp;Да<br/>
                <input type="radio" name="qualityQ" value="Нет" onClick="document.getElementById('qualityQText').disabled = true; return true;" >&nbsp;Нет<br/>
                <input type="radio" name="qualityQ" value="Да" onClick="dis('qualityQText');" >&nbsp;Да, но какие-то моменты могли быть лучше (указать, что именно)<br/>
                <textarea name="qualityQText" cols="3" style="width:450px;" id="qualityQText" disabled="disabled"></textarea><br/><br/>
            </li>
            <li><b>Достаточно ли размещенной на информационных стендах, интернет-сайте информации о выполняемых предприятием работах (услугах):</b><br/>
                 <input type="radio" name="standQ" value="Да, достаточно" onClick="document.getElementById('standQText').disabled = true; return true;" >&nbsp;Да, достаточно<br/>
                <input type="radio" name="standQ" value="Нет, не достаточно (указать, что именно)" onClick="dis('standQText');" >&nbsp;Нет, не достаточно (указать, что именно)<br/>
                <textarea name="standQText" cols="3" style="width:450px;" id="standQText" disabled="disabled"></textarea><br/><br/>
            </li>
            <li><b>Ваши предложения по совершествованию работы предприятия:</b><br/>
            <textarea name="offersQText" cols="3" style="width:450px;"></textarea>
            </li>                                                
         </ol> 
            <br/>
            <div class="td1"><input type="submit" name="saveQ" value="Сохранить" style="width:200"></div>
            </form>
         </div>
         <br/><br/><br/>
    
		</TD>
	</TR>
</TABLE>