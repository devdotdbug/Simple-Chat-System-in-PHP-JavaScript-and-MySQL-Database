<div class="w3-modal" id="backgroundUploader">
    <div class="w3-modal-content w3-container w3-mobile" style="width:50%;">
        <header class="w3-container w3-stretch w3-black">
            <span class="w3-large w3-right w3-button-small" onclick="this.parentElement.parentElement.parentElement.classList.remove('w3-show')">&times;</span>
            <h3 style="width:95%;">Choose a background photo...</h3>
        </header>
        <section class="w3-container w3-center">
            <div class="w3-container">
                <i class="bi bi-person-fill w3-jumbo"></i>
            </div>
            <form method="post" action="./c.con/engine.php" enctype="multipart/form-data">
                <input type="file" name="background" class="w3-input w3-margin">
                <input type="submit" name="uploadBackground" value="Upload Background" class="w3-button w3-pale-green">
            </form>
        </section>
    </div>
</div>