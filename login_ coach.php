<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบบันทึกสถิติว่ายน้ำ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
</head>

<!-- Section: Design Block -->
<section class=" text-center text-lg-start">
    <style>
    .rounded-t-5 {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
        .rounded-tr-lg-0 {
            border-top-right-radius: 0;
        }

        .rounded-bl-lg-5 {
            border-bottom-left-radius: 0.5rem;
        }
    }

    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
    </style>

    <body>
        <section class="vh-100" style="background-color: #924D3C;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block py-5">
                                    <img src="image/kkulogo.png" alt="login form" class="img-fluid"
                                        style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form>

                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                                <span class="h1 fw-bold mb-0">ระบบเก็บสติถิว่ายน้ำ</span>
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Satit kku
                                                swimming statistics system</h5>

                                            <div class="form-outline mb-4">
                                                <input type="password" id="name" class="form-control form-control-lg"
                                                    placeholder="กรอกรหัสของโค้ชเพื่อเข้าใช้งาน" />
                                            </div>
                                            <div class="pt-1 mb-4">
                                                <button class="btn btn-dark btn-lg btn-block"
                                                    type="button">เข้าใช้งาน</button>
                                            </div>
                                            <a class="small text-muted">เข้าใช้งานได้เฉพาะโค้ช</a>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>
    </body>

</html>