const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ["Cerebri Sans", ...defaultTheme.fontFamily.sans]
            },
            colors: {
                indigo: {
                    "900": "#191e38",
                    "800": "#2f365f",
                    "600": "#5661b3",
                    "500": "#6574cd",
                    "400": "#7886d7",
                    "300": "#b2b7ff",
                    "100": "#e6e8ff"
                }
            },
            boxShadow: theme => ({
                outline: "0 0 0 2px " + theme("colors.indigo.500")
            }),
            fill: theme => theme("colors"),
            fontSize: {
                xxs: ".55rem",
                x5: ".60rem",
            },
            width: {
                "0.5/12": "4.1666665%"
            },
            height: {
                "56.50": "16rem"
            },
            borderWidth: {
                one: "1px"
            },
            margin: {
                "22": "5.5rem"
            },
            padding: {
                "0.5": 	"0.55rem"
            },
        }
    },
    corePlugins: {
        listStyleType: false
    },
    variants: {
        fill: ["responsive", "hover", "focus", "group-hover"],
        textColor: ["responsive", "hover", "focus", "group-hover"],
        zIndex: ["responsive", "focus"]
    },
    plugins: [require("tailwind-scrollbar")]
};
