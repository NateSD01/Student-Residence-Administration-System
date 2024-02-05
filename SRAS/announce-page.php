<?php
// connect with database
$dbuser = "root";
$dbpass = "";
$host = "localhost";
$dbname = "hostel"; // Use the same database name as in the first code snippet

// Create a MySQLi connection
$mysqli = new mysqli($host, $dbuser, $dbpass, $dbname);

// Check for MySQLi connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully (PDO and MySQLi)";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();



?>


<!-- include CSS -->
<link rel="stylesheet" type="text/css" href="announcecss/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="announce-font-awesome/css/font-awesome.css" />

<!-- include JS -->
<script src="announcejs/jquery-3.3.1.min.js"></script>
<script src="announcejs/bootstrap.js"></script>


<!-- JavaScript initialization code -->
<script>
    $(document).ready(function () {
		console.log("Document Ready"); // Check if document is ready
        // Initialize Bootstrap components here
		$('[data-toggle="collapse"]').click(function() {
		console.log("Accordion Clicked"); // Check if accordion is clicked
        // Rest of your code to handle accordion clicks
		//ADDED CODE
		// Handle search button click
		$('#searchButton').click(function () {
        performSearch();
    });

	$('#goBackButton').click(function () {
            goBackToOriginal();
        });


    // Handle Enter key press in the search input
    $('#searchInput').keypress(function (e) {
        if (e.which === 13) {
            performSearch();
        }
    });
	function performSearch() {
        var searchTerm = $('#searchInput').val().toLowerCase();
		var foundResults = false; // Define foundResults here

        $('.panel').each(function () {
            var faqQuestion = $(this).find('.panel-title a').text().toLowerCase();
            if (faqQuestion.includes(searchTerm)) {
                $(this).show();
				foundResults = true;
            } else {
                $(this).hide();
            }
        });
			 // Check if there is a "No FAQs found" message
			 var noResultsMessage = $('#noResultsMessage').remove();
			 if (!foundResults) {
        // Add the "No FAQs found" message if it doesn't exist
        if (!noResultsMessage.length) {
            $('.panel-group').append('<p id="noResultsMessage">No FAQs found.</p>');
        }
        $('#goBackButton').show();
    } else {
        // Remove the "No FAQs found" message and hide the "Go Back" button
        noResultsMessage.remove();
        $('#goBackButton').hide();
    }

	}
		
	});
		//END OF ADDED CODE
	function goBackToOriginal() {
            // Show all FAQs and hide the "No FAQs found" message and the "Go Back" button
            $('.panel').show();
            $('#noResultsMessage').remove();
            $('#goBackButton').hide();
        }
    });
</script>


<?php
try {
    $stmt = $pdo->prepare("SELECT * FROM announces"); // Replace 'faq_table' with your actual table name
    $stmt->execute();
    $announces = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching ANNOUNCEMENT: " . $e->getMessage());
}
?>


<!-- show all FAQs in a panel -->
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
	<div class="row">
	<div class="col-md-12 text-center">
            <h1>Your Announcements</h1>
			<!--added search bar-->
			<div class="text-center">
    <h1></h1>
    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Search Announcements">
        <button id="searchButton">Search</button>
		<!-- Add the "Go Back" button with an ID -->
		<button id="goBackButton" style="display: none;">Go Back</button>
    </div>
</div>
<!--end of added search bar-->
        		</div>
    			</div>
		<div class="col-md-12 accordion_one">
			
		    <div class="panel-group">
		    	<?php foreach ($announces as $announce): ?>
			        <div class="panel panel-default">

			        	<!-- button to show the question -->
			            <div class="panel-heading">
			                <h4 class="panel-title">
			                	<a data-toggle="collapse" data-parent="#announceaccordion_oneLeft" href="#announce-<?php echo $announce['id']; ?>" aria-expanded="false" class="collapsed">
			                		<?php echo $announce['heading']; ?>
			                	</a>
			                </h4>
			            </div>

			            <!-- accordion for answer -->
			            <div id="announce-<?php echo $announce['id']; ?>" class="panel-collapse collapse" aria-expanded="false" role="tablist" style="height: 0px;">
			                <div class="panel-body">
			                	<div class="text-accordion">
			                        <?php echo $announce['text']; ?>
			                    </div>
			                </div>
			            </div>
			        </div>
		        <?php endforeach; ?>
				<!-- Add the "No FAQs found" message with an ID to hide it initially -->
				<p id="noResultsMessage" style="display: none;">Announcement not available.</p>
		    </div>
		</div>
	</div>
</div>

<!-- apply some styles -->
<style>
	.accordion_one .panel-group {
	    border: 1px solid #f1f1f1;
	    margin-top: 100px
	}
	a:link {
	    text-decoration: none
	}
	.accordion_one .panel {
	    background-color: transparent;
	    box-shadow: none;
	    border-bottom: 0px solid transparent;
	    border-radius: 0;
	    margin: 0
	}
	.accordion_one .panel-default {
	    border: 0
	}
	.accordion-wrap .panel-heading {
	    padding: 0px;
	    border-radius: 0px
	}
	h4 {
	    font-size: 18px;
	    line-height: 24px
	}
	.accordion_one .panel .panel-heading a.collapsed {
	    color: #999999;
	    display: block;
	    padding: 12px 30px;
	    border-top: 0px
	}
	.accordion_one .panel .panel-heading a {
	    display: block;
	    padding: 12px 30px;
	    background: #fff;
	    color: #313131;
	    border-bottom: 1px solid #f1f1f1
	}
	.accordion-wrap .panel .panel-heading a {
	    font-size: 14px
	}
	.accordion_one .panel-group .panel-heading+.panel-collapse>.panel-body {
	    border-top: 0;
	    padding-top: 0;
	    padding: 25px 30px 30px 35px;
	    background: #fff;
	    color: #999999
	}
	.img-accordion {
	    width: 81px;
	    float: left;
	    margin-right: 15px;
	    display: block
	}
	.accordion_one .panel .panel-heading a.collapsed:after {
	    content: "\2b";
	    color: #999999;
	    background: #f1f1f1
	}
	.accordion_one .panel .panel-heading a:after,
	.accordion_one .panel .panel-heading a.collapsed:after {
	    font-family: 'FontAwesome';
	    font-size: 15px;
	    width: 36px;
	    line-height: 48px;
	    text-align: center;
	    background: #F1F1F1;
	    float: left;
	    margin-left: -31px;
	    margin-top: -12px;
	    margin-right: 15px
	}
	.accordion_one .panel .panel-heading a:after {
	    content: "\2212"
	}
	.accordion_one .panel .panel-heading a:after,
	.accordion_one .panel .panel-heading a.collapsed:after {
	    font-family: 'FontAwesome';
	    font-size: 15px;
	    width: 36px;
	    height: 48px;
	    line-height: 48px;
	    text-align: center;
	    background: #F1F1F1;
	    float: left;
	    margin-left: -31px;
	    margin-top: -12px;
	    margin-right: 15px
	}
		/* Apply dark background to the entire page (outside the container) */
	body {
    	background-color: grey; /* Dark color of your choice */
    	margin: 0;
    	padding: 0;
		}

/* Set a light background for the content area */
	.container {
    	background-color: black;
    	padding: 20px; /* Add some padding to the content area if needed */
		}
 /* Center the title horizontally */
 	.text-center {
        text-align: center;
    }

    /* Style the title (customize as needed) */
    h1 {
        font-size: 36px;
        color: grey; /* Text color */
        margin-bottom: 10px; /* Adjust spacing as needed */
		font-weight: bold; /* Make the text bold */
    }

  /* Style the search button */
  #searchButton {
        background-color: teal; /* Teal background */
        color: white; /* White text color */
        text-shadow: 1px 1px 2px black; /* Black text shadow */
        /* You can add more styles here if needed */
    }

    /* Style the "Go Back" button */
    #goBackButton {
        background-color: purple; /* Light brown background */
        color: white; /* White text color */
        text-shadow: 1px 1px 2px black; /* Black text shadow */
        /* You can add more styles here if needed */
    }






</style>