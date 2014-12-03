<script>

    function updateTextInput(val) {
        document.getElementById('textInput').value=val;
    }

    function search_pin() {
        search_text = "";
        var description = document.getElementById('description').value;
        var category = document.getElementById('category').value;
        var country = document.getElementById('country').value;
        var cost = document.getElementById('cost').value;
        if(description != "") {
            search_text = search_text + "description="+description+"&";
        }
        if(category != "") {
            search_text = search_text + "category="+category+"&";
        }
        if(country != "") {
            search_text = search_text + "country="+country+"&";
        }
        if(cost != "") {
            search_text = search_text + "cost="+cost;
        }
        if(search_text != "")
            window.location.href = "searchnew.php?" + search_text;
    }
</script>
<?php
error_reporting(0);
?>

<div id="main">
    <form action="searchnew.php" method="get" onsubmit="return search_pin()" name="search_form">

    <div id="content">

        <div  class="row">
            <div class="col-lg-2">
                <p><b><label for="mysearch1">Search Anything</label></b></p>
            </div>

            <div class="col-lg-2">
                <p><b><label for="mysearch2">Category</label></b></p>
            </div>

            <div class="col-lg-2">
                <p><b><label for="mysearch3">Country</label></b></p>
            </div>
        </div>


        <div  class="row">
            <div class="col-lg-2">
                <div class=”form-group″>
                    <input class="form-control input-xs" placeholder="Type here" name="description" id="description" type="text"/>
                </div>
            </div>

            <div class="col-lg-2">
                <div class=”form-group″>
                    <select class="form-control input-xs"  name="category" id="category" type="text">
                        <option value="">--Select Category--</option>
                        <option value="Arts">Arts</option>
                        <option value="Backpacking">Backpacking</option>
                        <option value="BeachHolidays">Beach Holidays</option>
                        <option value="BudgetTravel">Budget Travel</option>
                        <option value="CityTravels">City Travels</option>
                        <option value="Culture">Culture</option>
                        <option value="DayTrips">Day Trips</option>
                        <option value="Education">Educational Trips</option>
                        <option value="FamilyTrips">Family Trips</option>
                        <option value="Getaways">Getaways</option>
                        <option value="History">Historical Trips</option>
                        <option value="Luxury">Luxury</option>
                        <option value="Nature">Nature</option>
                        <option value="Nightlife">Nightlife</option>
                        <option value="Religious">Religious Trips</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-2">
                <div class=”form-group″>
                    <select class="form-control input-xs"  name="country" id="country" type="text" >
                        <option value="">--Select Country--</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Canada">Canada</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Fiji">Fiji</option>
                        <option value="France">France</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Malta">Malta</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Norway">Norway</option>
                        <option value="Panama">Panama</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Romania">Romania</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="USA">United States of America</option>
                        <option value="Yemen">Yemen</option>
                    </select>
                </div>
            </div>
        </div>

        <div  class="row">
            <br>
        </div>

        <div  class="row">
            <div class="col-lg-1">
                <input class="form-control" type="text" id="textInput" value="50">
            </div>

            <div class="col-xs-3">
                <label for="points">Cost</label>
                <input type="range" name="cost" id="cost" value="50" min="0" max="100" onchange="updateTextInput(this.value);">
            </div>

            <div class="col-lg-2">
                <button class="btn btn-primary  btn-block active" type="submit" name="submit" value="Login">Search</button>
            </div>
        </div>

        <div  class="row">
            <br>
            <br>
        </div>
        <div  class="row">
        </div>

    </div>
        </form>
</div>
