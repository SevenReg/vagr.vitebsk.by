<SCRIPT LANGUAGE='JavaScript'>
function outmsg(msg,ctrlwidth)
{
   msg = " --- "+msg
   newmsg = msg
   while (newmsg.length < ctrlwidth) {newmsg += msg}
   document.write ('<FORM NAME="Outmsg">')
   document.write ('<CENTER><INPUT NAME="outmsg" VALUE= "'+newmsg+'" SIZE= '+ctrlwidth+'></CENTER>')
   document.write ('</FORM>')
   rollmsg()
}
function rollmsg()
{
   NowMsg=document.Outmsg.outmsg.value
   NowMsg=NowMsg.substring(1,NowMsg.length)+NowMsg.substring(0,1)
   document.Outmsg.outmsg.value = NowMsg
   bannerid=setTimeout("rollmsg()",100)
}
</SCRIPT>