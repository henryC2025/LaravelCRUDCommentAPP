<div class="textareaSection">

    <?php
            if(isset($_POST['submit'])){
            $name=$_POST["name"];
            }?>

    <form action="comment-message" class="text-center mt-5">
        <button class="btn deselectall-button" type="button" id="toggle-button">Deselect All</button>
        <button class="btn selectall-button" type="button" id="toggle-button">Select All</button>
        <input class="btn" id="btnGet" type="button" value="Get Selected" />
        <button class="btn" type="button" id="clear">Clear</button>
        <button class="btn" type="button" id="copy">Copy</button>
        <input class="btn" type="submit" value="Submit" name="submit">
        <br>
        <textarea class="mb-5 mt-2" id="message" rows="10" cols="100" name="message-comment"></textarea>
        {{-- Enter name<input type="textarea" name="name"> --}}
    </form>


</div>
