  <style>
      html {
          position: relative;
          min-height: 100%;
      }

      body {
          margin: 0;
          padding-bottom: 60px;
          /* Khoảng cách giữa nội dung và footer */
      }

      .container-fluid {
          position: absolute;
          bottom: 0;
          width: 100%;
          background-color: #f8f9fa;
          /* Màu nền của footer */
          padding: 10px 20px;
          /* Khoảng cách lề bên trong của footer */
      }

      /* Responsive styles */
      @media (max-width: 576px) {
          .container-fluid {
              text-align: center;
              /* Căn giữa nội dung trong trường hợp màn hình nhỏ */
          }
      }
  </style>
  <div class="container-fluid pt-4 px-4">
      <div class="bg-light rounded-top p-4">
          <div class="row">
              <div class="col-12 col-sm-6 text-center text-sm-start">
                  &copy; <a href="#">Your Site Name</a>, All Right Reserved.
              </div>
              <div class="col-12 col-sm-6 text-center text-sm-end">
                  Designed By <a href="https://htmlcodex.com">HTML Codex</a>
              </div>
          </div>
      </div>
  </div>
