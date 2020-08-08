<script type="text/javascript">
function AddRow(){
var oTable = document.getElementById("oTable");
var tBodies = oTable.tBodies;
var tbody = tBodies[0];
var tr = tbody.insertRow(tbody.rows.length);
var td_1 = tr.insertCell(0);
td_1.innerHTML = "<div contenteditable='true'>请输入订单号</div>";
var td_2 = tr.insertCell(1);
td_2.innerHTML = "<div contenteditable='true'>请输入申报日期</div>";
var td_1 = tr.insertCell(2);
td_2.innerHTML = "<div contenteditable='true'>请输入报关单号</div>";
var td_1 = tr.insertCell(3);
td_2.innerHTML = "<div contenteditable='true'>请输入箱单号</div>";
var td_1 = tr.insertCell(4);
td_2.innerHTML = "<div contenteditable='true'>请输入报关人</div>";
}
</script>