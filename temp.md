write a python script that read all the file name in its current folder. Take only the file name with ".png" format. Get both file name and ".png" of all picture. the gernerate the html file using the template here. The output should name "genHTML.html". Before that, you have to understand the format of the picture name first. For example, this picture has a name "[SALAD] Side Salad.png". You have to take the name in the bracket, this case is the "SALAD", and convert it to normal case which will be "Salad". Then put the result in the first div tag, in the class like in the code below. Next, go to the img tag. In the src part, you have to put the whole file name. In the alt part, you have to put only the actual name of the nemu, which show in the code below. Next, go to h6 tag, you can see that there is also a name of the food there, put the name there as well. This is finished for one html block. You have to repeate as many times as the number of .png picture you found. Just put the html code next to each other and save it as one file. Between each block, put 1 empty line, and ensure that tabs and indent are maintain.

```html
<div class="grid-item Salad">
    <div class="item py-2" style="width: 200px">
        <div class="product font-rale">
            <div class="d-flex flex-column">
                <a href="#">
                    <img
                    src="../assets/menu/[SALAD] Side Salad.png"
                    class="img-fluid"
                    alt="Side Salad"
                    />
                </a>
                <div class="text-center">
                    <h6 class="product-name">Side Salad</h6>
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <div class="price py-2">
                        <span>$152</span>
                    </div>
                    <button type="submit" class="btn btn-warning font-size-12">
                    Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
```