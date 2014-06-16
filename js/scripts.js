function close_admin() {
document.getElementById('nav_a').style.display = 'none';
document.getElementById('nav_place').style.display = 'none';
}

function add_favorite(a) {
  title=document.title;
  url=document.location;
  try {
    window.external.AddFavorite(url, title);
  }
  catch (e) {
    try {
      window.sidebar.addPanel(title, url, "");
    }
    catch (e) {
      if (typeof(opera)=="object") {
        a.rel="sidebar";
        a.title=title;
        a.url=url;
        a.href=url;
        return true;
      }
      else {
		message = document.getElementById("alertD").innerHTML;
        alert(message);
      }
    }
  }
  return false;
}

function openwin(url,widthu,heightu){
var newWin = window.open(url,
   "NewWin",
   "top=50,left=100,width="+widthu+",height="+heightu+",resizable=yes,scrollbars=yes,status=yes"
)
}
function bool_283(){
window.location = "#php_report";}
function reset_mess(){
window.location = "";
}