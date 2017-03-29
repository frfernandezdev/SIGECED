'use strict';

/* Directives */


app.directive('appVersion', function() {
    return function(scope, elm, attrs) {
      elm.text("hola");
    };
});

app.directive('convertToNumber', function() {
  return {
    require: 'ngModel',
    link: function(scope, element, attrs, ngModel) {
      ngModel.$parsers.push(function(val) {
        return parseInt(val, 10);
      });
      ngModel.$formatters.push(function(val) {
        return '' + val;
      });
    }
  };
});

app.directive('numbersOnly', function () {
    return {
        require: 'ngModel',
        link: function (scope, element, attr, ngModelCtrl) {
            function fromUser(text) {
                if (text) {
                    var transformedInput = text.replace(/[^0-9]/g, '');

                    if (transformedInput !== text) {
                        ngModelCtrl.$setViewValue(transformedInput);
                        ngModelCtrl.$render();
                    }
                    return transformedInput;
                }
                return undefined;
            }            
            ngModelCtrl.$parsers.push(fromUser);
        }
    };
});


app.directive('timePicker', function () {
    
        var options = {clear:"Limpiar",
        format: 'HH:i',
        container: 'body'};
    
        return {
            restrict: 'A',
            scope: {
                tpMax: "=",
                tpMin: "=",
				wait: "="
            },
            link: function (scope, el, attrs) {
			
				var make = function(){
					if(scope.tpMin)
						options.min = [scope.tpMin,0];
					if(scope.tpMax)
						options.max = [scope.tpMax,59];
					
					if(scope.wait){
						if(scope.tpMin && scope.tpMax)
							$(el).pickatime(options);
					}else
						$(el).pickatime(options);
				};
			
				scope.$watch('tpMax', function(newValue, oldValue) {
					make();
				}, true);
				
				scope.$watch('tpMin', function(newValue, oldValue) {
					make();
				}, true);
				
				if(!scope.wait)
					make();
            }
      };
  });

app.directive('datePicker', function () {
    
        var options = {monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        selectYears: 100,
        selectMonths: true,
        today: 'Hoy',
        clear: 'Limpiar',
        close: 'Cerrar',
        format:'dd-mm-yyyy',
        container: 'body'};
    
        return {
            restrict: 'A',
            scope: {
                max: "=",
                min: "="
            },
            link: function (scope, el, attrs) {
                var today = Date.now();
                if(scope.min)
                    options.min = new Date(today+parseInt(scope.min));
                if(scope.max)
                    options.max = new Date(today+parseInt(scope.max));
					
                $(el).pickadate(options);
            }
      };
  });