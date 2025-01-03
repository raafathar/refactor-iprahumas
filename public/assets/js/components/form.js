function LabelInput(title, id, required) {
    return `<label class="form-label mb-3" ${id ? `id="${id}" ` : ``}>
    ${title}
    ${required ? `<span class="text-danger">*</span>` : ""}
</label>`
}

const Input = (id, name, value, type, required) => {
    return `<input class="form-control" type="${type}" ${id ? `id="${id}" ` : ``} name="${name}" value="${value}" ${required
        ? "required" : ""}>`
}

const Checkbox = (id, name, condition) => {
    return `<input class="form-check-input" ${id ? `id="${id}" ` : ``} name="${name}" type="checkbox" id="color-primary"
    ${condition() ?? ""}>`
}

const SelectInput = (title, id, name, value, option, required) => {
    return `<select name="${name}" ${id ? `id="${id}" ` : ``}>
    <option disabled>-- PILIH ${title} --</option>
    ${option.map((value) => `<option value="${value.name}">${value.title}</option>`)}
</select>`
}

const Form = ({ title, id = null, name, value = null, type = "text", required = false, condition = null }) => {
    switch (type.toLowerCase()) {
        case "checkbox":
            return Checkbox(id, name, condition) + LabelInput(title, id, required)
        default:
            return LabelInput(title, id, required) + Input(id, name, value, type, required)
    }
}