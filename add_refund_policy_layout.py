import json
import uuid

def gen_key(prefix="field_ref_"):
    return prefix + uuid.uuid4().hex[:12]

file_path = "c:\\Main Storage\\Daftar Proyek\\modafinil-malaysia-wp\\acf-json\\group_page_modules.json"

with open(file_path, 'r', encoding='utf-8') as f:
    data = json.load(f)

modules_field = next((field for field in data['fields'] if field['name'] == 'modules'), None)

sub_fields = [
    {"label": "Title (EN)", "name": "title_en", "type": "text", "default": "Refund Policy & Guarantee"},
    {"label": "Title (MS)", "name": "title_ms", "type": "text", "default": "Dasar Bayaran Balik & Jaminan"},
    {"label": "Subtitle (EN)", "name": "subtitle_en", "type": "textarea", "default": "If your order does not arrive, we will reship it for free or issue a full refund."},
    {"label": "Subtitle (MS)", "name": "subtitle_ms", "type": "textarea", "default": "Jika pesanan anda tidak sampai, kami hantar semula secara percuma atau kembalikan wang anda sepenuhnya."},
    {
        "key": gen_key(),
        "label": "Badges / Highlights",
        "name": "badges",
        "type": "repeater",
        "layout": "block",
        "button_label": "Add Badge",
        "sub_fields": [
            {"key": gen_key(), "label": "Badge (EN)", "name": "badge_en", "type": "text"},
            {"key": gen_key(), "label": "Badge (MS)", "name": "badge_ms", "type": "text"}
        ]
    },
    {
        "key": gen_key(),
        "label": "Policy Sections",
        "name": "sections",
        "type": "repeater",
        "layout": "block",
        "button_label": "Add Section",
        "sub_fields": [
            {"key": gen_key(), "label": "Section Title (EN)", "name": "title_en", "type": "text"},
            {"key": gen_key(), "label": "Section Title (MS)", "name": "title_ms", "type": "text"},
            {"key": gen_key(), "label": "Content (EN)", "name": "content_en", "type": "textarea", "rows": 4},
            {"key": gen_key(), "label": "Content (MS)", "name": "content_ms", "type": "textarea", "rows": 4}
        ]
    }
]

for sf in sub_fields:
    if "key" not in sf:
        sf["key"] = gen_key()

if modules_field:
    layout_name = 'layout_refund_policy'
    modules_field['layouts'][layout_name] = {
        "key": layout_name,
        "name": "refund_policy",
        "label": "Refund Policy Page",
        "display": "block",
        "sub_fields": sub_fields
    }

with open(file_path, 'w', encoding='utf-8') as f:
    json.dump(data, f, indent=4)

print("Injected layout_refund_policy into ACF JSON")
