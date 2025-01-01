function LabelInput(title, required) {
    return `<label class="form-label mb-3">
        ${title}
        ${required ? `<span class="text-danger">*</span>` : ""}
    </label>`
}

const Input = (value, name, type, required) => {
    return `<input class="form-control" type="${type}" name="${name}" value="${value}"  ${required ? "required" : ""}>`
}

const Checkbox = (name, condition) => {
    return `<input class="form-check-input" name="${name}" type="checkbox" id="color-primary" ${condition() ?? ""}>`
}

const Form = ({ title, name, value = null, type = "text", required = false, condition = null }) => {
    switch (type.toLowerCase()) {
        case "checkbox":
            return Checkbox(name, condition) + LabelInput(title, required)
        default:
            return LabelInput(title, required) + Input(value, name, type, required)
    }
}