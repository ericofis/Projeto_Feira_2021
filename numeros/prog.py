from PIL import Image

from PIL import ImageFont
from PIL import ImageDraw

# Plot question mark: 
# pip install Pillow
# pip install image

img = Image.new('RGB', (500,500), (250,250,250))
draw = ImageDraw.Draw(img)
font = ImageFont.truetype("OpenSans-Regular.ttf", 400)
draw.text((180, -30),"?",(0,0,0),font=font)
img.save('question_mark_img.jpg')

# plot digit numbers (from 0 to 9):



for i in range(20):
    img = Image.new('RGB', (500,500), (250,250,250))
    draw = ImageDraw.Draw(img)
    font = ImageFont.truetype("OpenSans-Regular.ttf", 350)
    draw.text((50, -10),str(i),(0,0,0),font=font)
    img.save('digit_number_img_'+str(i)+'.jpg')
