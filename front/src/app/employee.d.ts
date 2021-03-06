
export interface IEmployee {
  name: string;
  designation: string;
  img: string;
  subordinates: IEmployee[];
}
export declare class Employee implements IEmployee {
  name: string;
  designation: string;
  img: string;
  subordinates: Employee[];
  manager?: Employee;
  constructor(orgStructure: string[], manager?: Employee);
}
