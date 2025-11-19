# SidePocketVibe.com - Image Specifications

## Overview

This document outlines the image size requirements and best practices for the SidePocketVibe.com website.

---

## Hero Banner Images (Featured Articles Carousel)

### Display Specifications

- **Display Width:** Full container width (typically 600-700px on desktop, responsive)
- **Display Height:** 200px (fixed, cropped)
- **Crop Method:** Center-focused with `object-fit: cover`

### Recommended Upload Sizes

- **Optimal Size:** **1200px × 300px** (4:1 aspect ratio)
- **Minimum Size:** 800px × 200px
- **File Format:** JPG or PNG
- **File Size:** Under 500KB (optimized for web)

### Best Practices

✓ Keep important subjects/text in the **horizontal center** of the image  
✓ Use landscape/panoramic compositions  
✓ Avoid placing critical content in the top or bottom 50px (will be cropped)  
✓ Test images at different screen sizes  
✗ Don't use portrait orientation  
✗ Avoid text that might get cropped

### Example URL Format

```
https://images.unsplash.com/photo-xxx?w=1200&h=300&fit=crop
```

---

## Article Grid Images (Latest Articles Section)

### Display Specifications

- **Display Width:** 300px (varies with grid layout)
- **Display Height:** 200px (fixed, cropped)
- **Crop Method:** Center-focused with `object-fit: cover`

### Recommended Upload Sizes

- **Optimal Size:** **600px × 400px** (3:2 aspect ratio)
- **Minimum Size:** 400px × 300px
- **File Format:** JPG or PNG
- **File Size:** Under 200KB (optimized for web)

### Best Practices

✓ Use clear, focused subject matter  
✓ Keep important elements in the center  
✓ Square or landscape orientations work best  
✓ High contrast images are more visually appealing  
✗ Avoid very detailed or busy images (they'll be small)  
✗ Don't use images with small text

### Example URL Format

```
https://images.unsplash.com/photo-xxx?w=400&h=300&fit=crop
```

---

## Discord Integration (No Custom Images Required)

The Discord sidebar uses auto-generated avatars from user initials. No image uploads needed.

---

## Quick Reference Table

| Location     | Width      | Height | Aspect Ratio | Upload Size  | Max File Size |
| ------------ | ---------- | ------ | ------------ | ------------ | ------------- |
| Hero Banner  | Full Width | 200px  | 4:1 or 6:1   | 1200 × 300px | 500KB         |
| Article Grid | 300px      | 200px  | 3:2          | 600 × 400px  | 200KB         |

---

## Image Optimization Tips

1. **Compression:** Use tools like TinyPNG or ImageOptim before uploading
2. **Format:** JPG for photos, PNG for graphics with transparency
3. **Naming:** Use descriptive filenames: `pool-table-championship-2025.jpg`
4. **Alt Text:** Always provide descriptive alt text for accessibility
5. **Loading:** Images use lazy loading for better performance

---

## Testing Checklist

Before publishing an article, verify:

- [ ] Image displays correctly on desktop (1920px width)
- [ ] Image displays correctly on tablet (768px width)
- [ ] Image displays correctly on mobile (375px width)
- [ ] No important content is cropped
- [ ] Image loads quickly (under 1 second)
- [ ] Alt text is descriptive and meaningful

---

## Examples of Good vs Bad Images

### ✓ Good Hero Images

- Pool table with balls in formation (wide shot)
- Professional player taking a shot (landscape)
- Championship trophy on felt (horizontal composition)
- Pool hall interior panorama

### ✗ Bad Hero Images

- Portrait orientation player photo (will be heavily cropped)
- Image with text at top or bottom (text will be cut off)
- Very dark or very bright images (poor contrast)
- Busy collages (too much visual noise)

---

## Technical Implementation

### CSS Applied to Hero Images

```css
.hero-image {
  width: 100%;
  height: 200px;
  overflow: hidden;
  border-radius: 8px;
}

.hero-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}
```

### CSS Applied to Grid Images

```css
.article-image {
  width: 100%;
  height: 200px;
  overflow: hidden;
  background-color: #e9ecef;
}

.article-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
```

---

## Contact & Questions

For questions about image specifications or technical implementation, refer to the main project documentation or contact the development team.

**Last Updated:** November 17, 2025
