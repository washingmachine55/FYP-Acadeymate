<style>
/* Default */
.theme {
  display: flex;
  align-items: center;
  -webkit-tap-highlight-color: transparent;
}

.theme__fill,
.theme__icon {
  transition: 0.3s;
}

.theme__fill {
  background-color: var(--bg);
  display: block;
  mix-blend-mode: difference;
  position: fixed;
  inset: 0;
  height: 100%;
  transform: translateX(-100%);
}

.theme__icon,
.theme__toggle {
  z-index: 1;
}

.theme__icon,
.theme__icon-part {
  position: absolute;
}

.theme__icon {
  display: block;
  top: 0.5em;
  left: 0.5em;
  width: 1.5em;
  height: 1.5em;
}

.theme__icon-part {
  border-radius: 50%;
  box-shadow: 0.4em -0.4em 0 0.5em hsl(0,0%,100%) inset;
  top: calc(50% - 0.5em);
  left: calc(50% - 0.5em);
  width: 1em;
  height: 1em;
  transition: box-shadow var(--transDur) ease-in-out,
		opacity var(--transDur) ease-in-out,
		transform var(--transDur) ease-in-out;
  transform: scale(0.5);
}

.theme__icon-part ~ .theme__icon-part {
  background-color: hsl(0,0%,100%);
  border-radius: 0.05em;
  top: 50%;
  left: calc(50% - 0.05em);
  transform: rotate(0deg) translateY(0.5em);
  transform-origin: 50% 0;
  width: 0.1em;
  height: 0.2em;
}

.theme__icon-part:nth-child(3) {
  transform: rotate(45deg) translateY(0.45em);
}

.theme__icon-part:nth-child(4) {
  transform: rotate(90deg) translateY(0.45em);
}

.theme__icon-part:nth-child(5) {
  transform: rotate(135deg) translateY(0.45em);
}

.theme__icon-part:nth-child(6) {
  transform: rotate(180deg) translateY(0.45em);
}

.theme__icon-part:nth-child(7) {
  transform: rotate(225deg) translateY(0.45em);
}

.theme__icon-part:nth-child(8) {
  transform: rotate(270deg) translateY(0.5em);
}

.theme__icon-part:nth-child(9) {
  transform: rotate(315deg) translateY(0.5em);
}

.theme__label,
.theme__toggle,
.theme__toggle-wrap {
  position: relative;
}

.theme__toggle,
.theme__toggle:before {
  display: block;
}

.theme__toggle {
  background-color: hsl(48,90%,85%);
  border-radius: 25% / 50%;
  box-shadow: 0 0 0 0.125em var(--primaryT);
  padding: 0.25em;
  width: 6em;
  height: 3em;
  -webkit-appearance: none;
  appearance: none;
  transition: background-color var(--transDur) ease-in-out,
		box-shadow 0.15s ease-in-out,
		transform var(--transDur) ease-in-out;
}

.theme__toggle:before {
  background-color: hsl(48,90%,55%);
  border-radius: 50%;
  content: "";
  width: 2.5em;
  height: 2.5em;
  transition: 0.3s;
}

.theme__toggle:focus {
  box-shadow: 0 0 0 0.125em var(--primary);
  outline: transparent;
}

/* Checked */
.theme__toggle:checked {
  background-color: hsl(198,90%,15%);
}

.theme__toggle:checked:before,
.theme__toggle:checked ~ .theme__icon {
  transform: translateX(3em);
}

.theme__toggle:checked:before {
  background-color: hsl(198,90%,55%);
}

.theme__toggle:checked ~ .theme__fill {
  transform: translateX(0);
}

.theme__toggle:checked ~ .theme__icon .theme__icon-part:nth-child(1) {
  box-shadow: 0.2em -0.2em 0 0.2em hsl(0,0%,100%) inset;
  transform: scale(1);
  top: 0.2em;
  left: -0.2em;
}

.theme__toggle:checked ~ .theme__icon .theme__icon-part ~ .theme__icon-part {
  opacity: 0;
}

.theme__toggle:checked ~ .theme__icon .theme__icon-part:nth-child(2) {
  transform: rotate(45deg) translateY(0.8em);
}

.theme__toggle:checked ~ .theme__icon .theme__icon-part:nth-child(3) {
  transform: rotate(90deg) translateY(0.8em);
}

.theme__toggle:checked ~ .theme__icon .theme__icon-part:nth-child(4) {
  transform: rotate(135deg) translateY(0.8em);
}

.theme__toggle:checked ~ .theme__icon .theme__icon-part:nth-child(5) {
  transform: rotate(180deg) translateY(0.8em);
}

.theme__toggle:checked ~ .theme__icon .theme__icon-part:nth-child(6) {
  transform: rotate(225deg) translateY(0.8em);
}

.theme__toggle:checked ~ .theme__icon .theme__icon-part:nth-child(7) {
  transform: rotate(270deg) translateY(0.8em);
}

.theme__toggle:checked ~ .theme__icon .theme__icon-part:nth-child(8) {
  transform: rotate(315deg) translateY(0.8em);
}

.theme__toggle:checked ~ .theme__icon .theme__icon-part:nth-child(9) {
  transform: rotate(360deg) translateY(0.8em);
}

.theme__toggle-wrap {
  margin: 0 0.75em;
}

@supports selector(:focus-visible) {
  .theme__toggle:focus {
    box-shadow: 0 0 0 0.125em var(--primaryT);
  }

  .theme__toggle:focus-visible {
    box-shadow: 0 0 0 0.125em var(--primary);
  }
}

</style>
{{--
<label for="theme" class="theme">
	<span class="theme__toggle-wrap">
		<input id="theme" class="theme__toggle" type="checkbox" role="switch" :checked="switchOn" name="theme" value="dark" x-ref="switchButton"
        type="button" >
		<span class="theme__fill"></span>
		<span class="theme__icon">
			<span class="theme__icon-part"></span>
			<span class="theme__icon-part"></span>
			<span class="theme__icon-part"></span>
			<span class="theme__icon-part"></span>
			<span class="theme__icon-part"></span>
			<span class="theme__icon-part"></span>
			<span class="theme__icon-part"></span>
			<span class="theme__icon-part"></span>
			<span class="theme__icon-part"></span>
		</span>
	</span>
</label> --}}

<div x-data="window.themeSwitcher()" x-init="switchTheme()" @keydown.window.tab="switchOn = false" class="flex items-center justify-center space-x-2">
    <input id="thisId" type="checkbox" name="switch" class="hidden" :checked="switchOn">

    <button
        x-ref="switchButton"
        type="button"
        @click="switchOn = ! switchOn; switchTheme()"
        :class="switchOn ? 'bg-blue-600' : 'bg-neutral-200'"
        class="relative inline-flex h-9 py-0.5 ml-4 focus:outline-none rounded-full w-16">
        <span :class="switchOn ? 'translate-x-[30px]' : 'translate-x-0.5'" class="w-8 h-8 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
    </button>
</div>
