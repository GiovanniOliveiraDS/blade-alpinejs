import Alpine from "alpinejs";
import Mask from "./mask";

Alpine.directive('mask', (el, { modifiers }, { effect }) => Mask(el, modifiers, effect));
