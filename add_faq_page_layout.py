import json
import uuid

def gen_key(prefix="field_faq_"):
    return prefix + uuid.uuid4().hex[:12]

file_path = "c:\\Main Storage\\Daftar Proyek\\modafinil-malaysia-wp\\acf-json\\group_page_modules.json"

with open(file_path, 'r', encoding='utf-8') as f:
    data = json.load(f)

modules_field = next((field for field in data['fields'] if field['name'] == 'modules'), None)

fields_def = [
    {"label": "Eyebrow (EN)", "name": "eyebrow_en", "type": "text", "default": "FAQ"},
    {"label": "Eyebrow (MS)", "name": "eyebrow_ms", "type": "text", "default": "Soalan Lazim"},
    {"label": "Heading (EN)", "name": "heading_en", "type": "text", "default": "Frequently Asked Questions / FAQ"},
    {"label": "Heading (MS)", "name": "heading_ms", "type": "text", "default": "Soalan Lazim / FAQ"},
    {"label": "Description (EN)", "name": "description_en", "type": "textarea", "default": "Everything you need to know about buying Modafinil in Malaysia."},
    {"label": "Description (MS)", "name": "description_ms", "type": "textarea", "default": "Semua yang anda perlu tahu tentang membeli Modafinil di Malaysia."},
    {"label": "CTA Heading (EN)", "name": "cta_heading_en", "type": "text", "default": "Still Have Questions?"},
    {"label": "CTA Heading (MS)", "name": "cta_heading_ms", "type": "text", "default": "Masih Ada Soalan?"},
    {"label": "CTA Desc (EN)", "name": "cta_desc_en", "type": "textarea", "default": "Our team speaks Malay and English, ready to assist 7 days a week."},
    {"label": "CTA Desc (MS)", "name": "cta_desc_ms", "type": "textarea", "default": "Pasukan kami berbahasa Malaysia dan English, sedia membantu 7 hari seminggu."},
    {"label": "CTA Button Text (EN)", "name": "cta_btn_text_en", "type": "text", "default": "WhatsApp Us Now"},
    {"label": "CTA Button Text (MS)", "name": "cta_btn_text_ms", "type": "text", "default": "WhatsApp Kami Sekarang"},
    {"label": "CTA Button Link", "name": "cta_btn_link", "type": "url", "default": "https://wa.me/601116284532"}
]

sub_fields = []
for f_info in fields_def:
    sub_fields.append({
        "key": gen_key(),
        "label": f_info["label"],
        "name": f_info["name"],
        "aria-label": "",
        "type": f_info["type"],
        "instructions": "",
        "required": False,
        "conditional_logic": False,
        "wrapper": {"width": "", "class": "", "id": ""},
        "default_value": f_info["default"],
        "placeholder": ""
    })

if modules_field:
    layout_name = 'layout_faq_page'
    modules_field['layouts'][layout_name] = {
        "key": layout_name,
        "name": "faq_page",
        "label": "FAQ Full Page",
        "display": "block",
        "sub_fields": sub_fields
    }

with open(file_path, 'w', encoding='utf-8') as f:
    json.dump(data, f, indent=4)

print("Injected layout_faq_page into ACF JSON")
