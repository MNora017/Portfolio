<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- CVV-->
<div class="form-group">
<label class="creditcard" data-toggle="tooltip" placeholder=" 3 digits " data-original-title="3 digits code on back side of the card" for="">
CVV</label>
<input type="number" class="form-control" required>
<i class="fa fa-question-circle">

<!-- Email--> 
<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@address.com">
</i>
</div>



<div class="col-12">
<label for="email" class="form-label">E-mail</label>
<input
  type="email"
  class="form-control"
  id="email"
  placeholder="you@example.com"
  required
/>
<div class="invalid-feedback">
  Veuillez entrer une adresse e-mail corrected
</div>
</div>
</div>

<hr class="my-4" />




<h4 class="mb-3">Méthode de paiement</h4>
<div class="my-3">
<div class="form-check">
<input
  id="credit"
  name="paymentMethod"
  type="radio"
  class="form-check-input"
  checked=""
  required=""
  value="card"
/>


<div class="row gy-3">
<div class="col-md-6">
<label for="cc-name" class="form-label">Nom sur la carte</label>
<input
  type="text"
  class="form-control"
  id="cc-name"
  placeholder=""
  required=""
  name="card-name"
/>
<small class="text-muted">Nom complet inscrit sur la carte</small>
<div class="invalid-feedback">Erreur</div>
</div>

<!-- number Carte-->


<i class="fa fa-question-circle">
<abbr title="Indiqué les 3 chiffres qui se citu deriere la carte"></abbr>
</i>
<hr class="my-4" />

<button class="w-100 btn btn-white btn-lg" type="submit">Acheter</button>
</form>
</section>
</section>
</section>





            <div class="container">
              <div class="row">
                <div class="span12">
                  <form class="form-horizontal span6">
                    <fieldset>
                      <legend>Payment</legend>
                   
                      <div class="control-group">
                        <label class="control-label">Card Holder's Name</label>
                        <div class="controls">
                          <input type="text" class="input-block-level" pattern="\w+ \w+.*" title="Fill your first and last name" required>
                        </div>
                      </div>
                   
                      <div class="control-group">
                        <label class="control-label">Card Number</label>
                        <div class="controls">
                          <div class="row-fluid">
                            <div class="span3">
                              <input type="text" class="input-block-level" autocomplete="off" maxlength="4" pattern="\d{4}" title="First four digits" required>
                            </div>
                            <div class="span3">
                              <input type="text" class="input-block-level" autocomplete="off" maxlength="4" pattern="\d{4}" title="Second four digits" required>
                            </div>
                            <div class="span3">
                              <input type="text" class="input-block-level" autocomplete="off" maxlength="4" pattern="\d{4}" title="Third four digits" required>
                            </div>
                            <div class="span3">
                              <input type="text" class="input-block-level" autocomplete="off" maxlength="4" pattern="\d{4}" title="Fourth four digits" required>
                            </div>
                          </div>
                        </div>
                      </div>
                   
                      <div class="control-group">
                        <label class="control-label">Card Expiry Date</label>
                        <div class="controls">
                          <div class="row-fluid">
                            <div class="span9">
                              <select class="input-block-level">
                                <option>January</option>
                                <option>...</option>
                                <option>December</option>
                              </select>
                            </div>
                            <div class="span3">
                              <select class="input-block-level">
                                <option>2013</option>
                                <option>...</option>
                                <option>2015</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                   
                      <div class="control-group">
                        <label class="control-label">Card CVV</label>
                        <div class="controls">
                          <div class="row-fluid">
                            <div class="span3">
                              <input type="text" class="input-block-level" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required>
                            </div>
                            <div class="span8">
                              <!-- screenshot may be here -->
                            </div>
                          </div>
                        </div>
                      </div>
                   
                      <picture class="row justify-content-center">
    <img class="col-sm-2 " width="2%" height="2%" src="image/insta.png" alt="">
    <img class="col-sm-2 " width="2%" height="2%" src="image/facebook.png" alt="">
    <img class="col-sm-2 " width="2%" height="2%" src="image/twiteer.png" alt=""></img>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
            <div class="row">
                
                <input type="number" id="qty_input" class=" mt-2 form-control form-control-sm" value="1" min="1" max="" required>
        
                
            <div class="input-group-prepend">
                    <button class="btn btn-dark btn-sm" id="number"><i class="fa fa-plus">▲</i></button>
                
                
                    <button class="btn btn-dark btn-sm" id="number"><i class="fa fa-minus">▼</i></button>
                </div>
             </div>
         </div>
     

