<!--About Us area start-->
	<div class="container-fluid p-4" style="background-color:#E9ECEF;">
		<div class="container" style="background-color: #E9ECEF;">
			<div class="row text-center">
				<div class="col-sm">
					<h5>About US</h5>
					<p>This code will display the popular courses in a vertical line, and you can add more courses following the same structure.</p>
				</div>
				<div class="col-sm">
					<h5>Catagory</h5>
					<a class="text-dark" href="#"style="text-decoration: none;"> Web Designer</a><br>
					<a class="text-dark" href="#"style="text-decoration: none;"> Web Developer</a><br>
					<a class="text-dark" href="#"style="text-decoration: none;"> Android Designer</a><br>
					<a class="text-dark" href="#"style="text-decoration: none;"> Android Developer</a><br>
					<a class="text-dark" href="#"style="text-decoration: none;"> iOS Designer</a><br>
					<a class="text-dark" href="#"style="text-decoration: none;"> iOS Developer</a><br>
				</div>
				<div class="col-sm">
					<h5>Contact Us</h5>
					<p>eSchool,
				Near Dhaka University,
				Shabag, Dhaka 1100<br />
				Phone: +880215698<br />
				www.eschool.edu.bd </p>
				</div>
			</div>
		</div>
	</div>
	<!--About area end-->

	<!--Footer area start-->
	<footer class="container-fluid bg-dark text-center p-2">
		<small class="text-white"> Copyright &copy; 2023 || Powered by Kryzotech || <a href="#" data-bs-toggle="modal" data-bs-target="#adminexampleModal" style="text-decoration: none;">Admin Login</a> </small>
	</footer>
	<!--Footer area End-->

	<script type="text/javascript" src="assets/js/all.min.js"></script>
	<script type="text/javascript" src="assets/js/propper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/ajaxrequest.js"></script>
	<script type="text/javascript" src="assets/js/adminajaxrequest.js"></script>
	<!--Section handeling script-->
	<script>
  // Smooth scrolling function
  function smoothScroll(target) {
    const element = document.querySelector(target);
    if (element) {
      window.scrollTo({
        top: element.offsetTop,
        behavior: 'smooth'
      });
    }
  }

  // Add click event listeners to the links
  document.querySelectorAll('.custom-nav-item').forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault(); // Prevent default link behavior

      const target = this.getAttribute('href'); // Get the target section ID from href attribute
      smoothScroll(target); // Call smoothScroll function passing the target section ID
    });
  });
</script>

	<!--Owl Testyslider script-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script>
	  $(document).ready(function(){
	    $('#testimonial-slider').owlCarousel({
	      loop:true,
	      margin:10,
	      nav:true,
	      responsive:{
	        0:{
	          items:1
	        },
	        600:{
	          items:2
	        },
	        1000:{
	          items:3
	        }
	      }
	    });

	    // Function to fetch and display student's image based on email
	    function fetchStudentImage(email, index) {
	      // You can replace this logic with your own method to fetch the student's image
	      // For demonstration purposes, I'm assuming a simple switch based on email
	      let studentImageSrc = '';
	      let studentName = '';
	      
	      // Example switch based on email
	      switch (email) {
	        case 'student1@example.com':
	          studentImageSrc = 'student1.jpg';
	          studentName = 'Parvez Mosarof';
	          break;
	        // Add more cases for different students as needed
	        default:
	          // Default image or error handling
	          studentImageSrc = 'default.jpg';
	          studentName = 'Unknown Student';
	      }

	      // Set the image source and student name for the specific testimonial index
	      $('#studentImage' + index).attr('src', studentImageSrc);
	      $('#studentName' + index).text(studentName);
	    }

	    // Fetch student's image based on their email when the page loads
	    fetchStudentImage('student1@example.com', 1); // Example email and testimonial index
	    // Fetch images for other testimonials if needed
	  });
	</script>


</body>
</html>