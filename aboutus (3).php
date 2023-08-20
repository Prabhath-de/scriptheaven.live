<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    <style>
        .about {
            padding: 0px;
            flex-direction: column;
        }

        .about-image {
            margin-right: 0px;
            margin-bottom: 20px;
        }

        .about-content {
            padding: 0px;
            font-size: 16px;
        }

        .about-content .read-more {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>

    <center><h1>ABOUT US</h1></center>
    <br>
    <h1> </h1>
    <br>

    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="images/nsbm.jpg" width="100%" height="auto" alt="NSBM Image">
            </div>

            <div class="about-content">
                <h2>NSBM Green University</h2>
                <br>
                <p>NSBM Green University, the nation’s premier degree-awarding institute, is the first of
                    its kind in South Asia. It is a government-owned self-financed institute that operates
                    under the purview of the Ministry of Education. As a leading educational centre in the
                    country, NSBM has evolved into becoming a highly responsible higher education
                    institute that offers unique opportunities and holistic education on par with international
                    standards while promoting sustainable living.
                    NSBM offers a plethora of undergraduate and postgraduate degree programmes under
                    five faculties: Business, Computing, Engineering, Science and Postgraduate &
                    Professional Advancement. These study programmes at NSBM are either its own
                    programmes recognised by the University Grants Commission and the Ministry of
                    Higher Education or world-class international programmes conducted in affiliation with
                    top-ranked foreign universities such as University of Plymouth, UK, and Victoria
                    University, Australia.</p>
                <br>
                <a href="https://www.nsbm.ac.lk/story-of-nsbm/" class="read-more">Read More</a>
            </div>
        </section>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
