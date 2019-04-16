<hr>
  <br> <!-- Footer -->
  <footer class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-yellow">_</h5>
        <p>Universiti Sultan Zainal Abidin</p>
        <p>Cashless - QR-code Web Administration System</p>
		<small>&copy; Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
      </div>
    </div>
  </footer>




<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

<!-- skrip untuk check all box borang masa print-->
<script language="JavaScript">
// Listen for click on toggle checkbox
$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});
</script>

<!-- Skrip untuk validation sila pilih salah satu checkbox untuk button cetak semua-->
<script type="text/javascript">
function checksemua() {
var checked=false;
	var elements = document.getElementsByName("invite[]");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
		}
	}
	if (!checked) {
		alert('Sila Pilih Salah Satu untuk Cetakan');
		return false;
	}
	else { return true; }
	//return checked;
}
</script>