import { TestBed } from '@angular/core/testing';

import { SharedDataOrchartService } from './shared-data-orchart.service';

describe('SharedDataOrchartService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: SharedDataOrchartService = TestBed.get(SharedDataOrchartService);
    expect(service).toBeTruthy();
  });
});
