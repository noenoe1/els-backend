/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
				primary :  {
					'000':"#EAEBF3",
					10: '#EEF2FF',
					50: "#fff7ed",
					100:"#ffedd5",
					200:"#fed7aa",
					300:"#fdba74",
					400:"#fb923c",
					500:"#f97316",
					600:"#ea580c",
					700:"#c2410c",
					800:"#9a3412",
					900:"#7c2d12"
				},
				secondary :  {
					'000':"#F9FAFB",
					'50': '#F9FAFB',
					100:"#F3F4F6",
					200:"#E5E7EB",
					300:"#D1D5DB",
					400:"#9CA3AF",
					500:"#6B7280",
					600:"#4B5563",
					700:"#374151",
					800:"#1F2937",
					900:"#111827"
				},
				secondaryDark :  {
					"accent":"#FFFFFF",
					"white":"#FFFFFF",
					"black":'#121212',
					"grey":"#999999",
					100: "#646464"
				},
				'primary-light': '#F7F8FC',
				'secondary-light': '#FFFFFF',
				'ternary-light': '#f6f7f8',

				'primary-dark': '#0D2438',
				'secondary-dark': '#102D44',
				'ternary-dark': '#1E3851',
			},
    },
  },
  plugins: [],
}

