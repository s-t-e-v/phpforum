<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 19:27:18 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-20 21:44:34
 * @Description: This is the footer part of the webpages. The bootstrap js cdn script is placed here.
 */
?>

</div>
<?php
/** unsetting to avoid the superglobal affecting other pages than the home page */
unset($_SESSION['is_home_page']);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.bundle.min.js" integrity="sha512-1TK4hjCY5+E9H3r5+05bEGbKGyK506WaDPfPe1s/ihwRjr6OtL43zJLzOFQ+/zciONEd+sp7LwrfOCnyukPSsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>