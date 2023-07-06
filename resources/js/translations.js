import { createApp } from "vue";
import { usePage } from "@inertiajs/vue3";

const translate = (key, count = 1, placeholders = {}) => {
    const translations = usePage().props.localization.translations;
    const translationKey = key + (count === 1 ? ".singular" : ".plural");
    const translation = translations[translationKey] || translations[key];

    if (typeof translation === "string") {
        let translatedText = translation;

        for (const placeholder in placeholders) {
            translatedText = translatedText.replace(`:${placeholder}`, placeholders[placeholder]);
        }

        return translatedText.replace(":count", count);
    }

    return key;
};

const Translation = {
    install: (app) => {
        app.config.globalProperties.__ = translate;
    },
};

export default Translation;
