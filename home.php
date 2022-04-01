<div class="w">
<div class="main_content">
        <div class="header"></div>  
        <div class="info">
        <form>
              <div class="form-group col-md-6">
                  <b><label for="SN">Student Name: </label></b>
                  <input class="form-control" id="SN" name="SN" placeholder="Enter your name" type="text" required minlength="3" maxlength="11">
              </div>
              <div class="form-row">
                <div class="form-group">
                  <b><label for="ID">Student ID: </label></b>
                  <input type="tel" class="form-control" id="ID" name="ID" placeholder="Student ID" required>
                </div>
                <div class="form-group">
                  <b><label for="IC">IC Number: </label></b>
                  <input type="tel" class="form-control" id="IC" name="IC" placeholder="IC Number" required>
                </div>
              </div>
              <div class="form-group">
                  <b><label for="email">Email:</label></b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
              </div>
              
              <div class="form-group">
                <b><label for="phone">Phone No:</label></b>
                <div class="input-group mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon">+60</span>
                  </div>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[1-9]{2}[0-9]{7}" maxlength="20">
                </div>
              </div>
              <div class="form-group">
                  <b><label for="address">Address:</label></b>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Your Address" required>
              </div>
              
              <button type="" class="btn btn-success">EDIT</button>
            </form>
      </div>
    </div>
</div>