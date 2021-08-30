<!DOCTYPE html>

<html lang="en-us">
<head>
    <title>Hackathon | Automation Anywhere Bot Games | By Erica D. Perkins | ericadperkins.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        #bodyWrap {
            height: 100vh;
        }

        #para-purchase {
            text-align: justify;
        }

        ol {
            margin-left: -1em;
        }
    </style>
</head>

<body>
    <div id="bodyWrap" class="container">
        <!--About row-->
        <div class="row">
            <div class="col">
                <h1 class="display-3">Theme: Front Office</h1>
                <p class="lead"><strong>Example use case: </strong>Retrieving customer data from multiple systems via a form</p>
                <hr>
            </div>
        </div>
        <!--Form row-->
        <div class="row">
            <div class="col-5">
                <div class="row">
                    <div class="col">
                        <h3 class="fs-2 fw-normal">Data to retrieve</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="para-purchase" class="form-label"><strong>Top purchasers</strong></label>
                        <br>
                        <p class="font-justify lh-base" id="para-purchase">
                            This allows users with admin privileges to fetch a list of the companies top purchasers.
                            To the right underneath results a numerical order list of customers who complete the most purchases will display; this does not include the total value of all purchases made.
                        </p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="topPurchasers" name="topPurchasers">
                            <div class="form-group mb-3">
                                <input type="submit" class="btn btn-primary" id="topPurchasersSubmitButton" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6 offset-1">
                <div class="row">
                    <h3 class="fs-2 fw-normal">Results</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <ol>
                            <?php
                            $conn = new mysqli("host", "username", "password", "database", "port");

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $query = "SELECT first_name, last_name, email, COUNT(first_name) AS UserNameFrequency FROM customer INNER JOIN customer_order ON customer.customer_id = customer_order.customer_id GROUP BY first_name LIMIT 0,5";
                                $topUsers = $conn->query($query);
                                while ($row = $topUsers->fetch_assoc()) {
                                    echo "<li><span class='fw-light'>Customer name: </span>" . ucfirst($row["first_name"]) . " " . ucfirst($row["last_name"]) . " <span class='fw-light'>Email: </span>" . $row["email"] . "</li>";
                                }
                            }
                            ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 position-absolute start-0 bottom-0 bg-dark text-white text-center">
                <div class="row">
                    <p class="lead fs-6">
                        <strong>BY: </strong>Erica D. Perkins
                    </p>
                </div>
            </div>
        </div>
</body>

</html>
