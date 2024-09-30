import os
import re

def process_filename(filename):
    # Extract category and name
    match = re.match(r'\[(.+)\]\s(.+)\.png', filename)
    if match:
        category = match.group(1).capitalize()
        name = match.group(2)
        return category, name, filename
    return None, None, None

def generate_html_block(category, name, filename):
    return f"""<div class="grid-item {category}">
    <div class="item py-2" style="width: 200px">
        <div class="product font-rale">
            <div class="d-flex flex-column">
                <a href="#">
                    <img
                    src="../assets/menu/{filename}"
                    class="img-fluid"
                    alt="{name}"
                    />
                </a>
                <div class="text-center">
                    <h6 class="product-name">{name}</h6>
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
</div>"""

def main():
    # Get all .png files in the current directory
    png_files = [f for f in os.listdir('.') if f.endswith('.png')]
    
    html_blocks = []
    
    for png_file in png_files:
        category, name, filename = process_filename(png_file)
        if category and name:
            html_block = generate_html_block(category, name, filename)
            html_blocks.append(html_block)
    
    # Generate the final HTML content
    html_content = '\n\n'.join(html_blocks)
    
    # Write the HTML content to genHTML.html
    with open('genHTML.html', 'w') as f:
        f.write(html_content)

if __name__ == "__main__":
    main()