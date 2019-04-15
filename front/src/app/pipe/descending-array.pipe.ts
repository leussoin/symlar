import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'descendingArray'
})
export class DescendingArrayPipe implements PipeTransform {

  transform(value: any, args?: any): any {
    return value.reverse((usr: any) => usr.descendingArray);
  }

}
